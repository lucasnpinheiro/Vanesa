<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 */
class PedidosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('titulo_pagina', 'Pedidos');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        if ($this->request->query('data_pedido')) {
            $this->request->query['data_pedido'] = implode('-', array_reverse(explode('/', $this->request->query('data_pedido'))));
        }
        $query = $this->Pedidos->find('search', $this->Pedidos->filterParams($this->request->query));

        $this->set('pedidos', $this->paginate($query));
        $this->set('_serialize', ['pedidos']);
        $this->set('status', $this->request->query('status'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['PedidosItens']
        ]);

        $this->set('pedido', $pedido);
        $this->set('_serialize', ['pedido']);
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function verifica($id = null) {
        $pedido = $this->Pedidos->find()->where(['ficha' => $id])->order(['id' => 'desc'])->first();
        if (!empty($pedido) && $pedido->status === 0) {
            $retorno = [
                'cod' => 999,
                'id' => $pedido->id
            ];
        } else {
            $pedido = $this->Pedidos->newEntity();
            $pedido->ficha = $id;
            $pedido->data_pedido = date('Y-m-d');
            $pedido->status = 0;
            $pedido->nome = '';
            $this->Pedidos->save($pedido);
            $retorno = [
                'cod' => 111,
                'id' => $pedido->id
            ];
        }
        echo json_encode($retorno);
        exit;
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function cancelar($id = null) {
        $pedido = $this->Pedidos->find()->where(['ficha' => $id])->order(['id' => 'desc'])->first();
        $pedido->status = 2;
        $this->Pedidos->save($pedido);
        $this->redirect(['action' => 'add']);
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function finalizar($id = null) {
        $this->loadModel('CaixasDiarios');
        $findCaixa = $this->CaixasDiarios->find()->where(['terminal' => 1, 'data' => date('Y-m-d'), 'pessoa_id' => $this->Auth->user('id')])->first();

        $pedido = $this->Pedidos->find()->where(['ficha' => $id])->order(['id' => 'desc'])->first();
        $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
        
        $pedido->data = new \DateTime('Y-m-d');
        $pedido->status = 1;
        $pedido->caixas_diario_id = $findCaixa->id;
        $this->Pedidos->save($pedido);
        $this->loadModel('PedidosItens');
        $this->loadModel('GruposEstoques');
        $this->loadModel('Produtos');
        $itens = $this->PedidosItens->find()->where(['pedido_id' => $pedido->id])->all();

        if (!empty($itens)) {
            foreach ($itens as $k => $v) {
                $produtoBaixa = $produto = $this->Produtos->get((int) $v->produto_id);
                $gruposEstoque = $this->GruposEstoques->get($produto->grupos_estoque_id);
                if ($gruposEstoque->estoque_global > 0) {
                    $produto = $this->Produtos->get((int) $gruposEstoque->estoque_global);
                }
                if ($produtoBaixa->peso_baixa_estoque > 0) {
                    $produto->estoque_atual -= (double) ((double) $produtoBaixa->peso_baixa_estoque * (double) $v->quantidade);
                } else {
                    $produto->estoque_atual -= (double) $v->quantidade;
                }

                $this->Produtos->save($produto);
            }
        }
        //echo json_encode(['msg' => 'ok']);
        $this->redirect(['action' => 'add']);
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function atualizar($id = null) {
        $pedido = $this->Pedidos->find()->where(['ficha' => $id])->order(['id' => 'desc'])->first();
        if (!empty($pedido)) {
            $pedido = $this->Pedidos->get($pedido->id, [
                'contain' => []
            ]);
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
            $this->Pedidos->save($pedido);
        }
        $retorno['cod'] = 999;
        echo json_encode($retorno);
        exit;
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null) {
        $this->loadModel('CaixasDiarios');
        $findCaixa = $this->CaixasDiarios->find()->where(['terminal' => 1, 'data' => date('Y-m-d'), 'pessoa_id' => $this->Auth->user('id')])->first();
        if (count($findCaixa) > 0) {
            if (is_null($id)) {
                $pedido = $this->Pedidos->newEntity();
            } else {
                $pedido = $this->Pedidos->get($id, [
                    'contain' => ['PedidosItens' => function($q) {
                            return $q->order(['sequencia' => 'asc'])->contain('Produtos');
                        }]
                        ]);
                    }
                    $this->loadModel('Produtos');
                    $produtos = [];
                    $produtos_lista = [];
                    $_lista_produtos = $this->Produtos->find()->where(['status' => 1])->all();
                    $produtos_botoes = $this->Produtos->find()->where(['status' => 1, 'atalho' => 1])->all();
                    $lista_produtos = [];
                    foreach ($_lista_produtos as $key => $value) {
                        $lista_produtos[(int) $value->id] = $value;
                        $lista_produtos[(int) $value->barra] = $value;
                        $produtos[(int) $value->barra] = $value->barra . ' - ' . $value->nome;
                        $produtos[(int) $value->id] = $value->barra . ' - ' . $value->nome;
                        $produtos_lista[(int) $value->barra] = $value->barra;
                        $produtos_lista[(int) $value->id] = $value->barra;
                    }
                    unset($_lista_produtos);
                    $this->set(compact('pedido', 'lista_produtos', 'produtos', 'produtos_lista', 'produtos_botoes'));
                    $this->set('_serialize', ['pedido']);
                } else {
                    $this->Flash->error(__('Não foi localizado caixa aberto para este dia.'));
                    $this->redirect(['controller' => 'CaixasDiarios', 'action' => 'add']);
                }
            }

            public function additens() {
                $pedido = $this->Pedidos->find()->where(['ficha' => $this->request->data('ficha')])->order(['id' => 'desc'])->first();
                $this->loadModel('PedidosItens');
                $findItens = $this->PedidosItens->find()->where(['pedido_id' => $pedido->id, 'sequencia' => (int) $this->request->data('sequencia')])->first();

                if ($this->request->data('acao') == 'remove') {
                    $this->PedidosItens->delete($findItens);
                } else {
                    if (!empty($findItens)) {
                        $pedidoItens = $this->PedidosItens->get($findItens->id);
                    } else {
                        $pedidoItens = $this->PedidosItens->newEntity();
                    }
                    $this->loadModel('Produtos');
                    $produto = $this->Produtos->get($this->request->data('produto_id'));

                    $pedidoItens->pedido_id = $pedido->id;
                    $pedidoItens->produto_id = (int) $this->request->data('produto_id');
                    $pedidoItens->sequencia = (int) $this->request->data('sequencia');
                    $pedidoItens->valor_venda = ($produto->promocao > 0 ? $produto->promocao : $produto->venda);
                    $pedidoItens->quantidade = (double) $this->request->data('quantidade');
                    if ($this->request->data('acao') == 'desconto') {
                        $pedidoItens->perc_desconto = (double) str_replace(',', '.', str_replace('.', '', $this->request->data('desconto')));
                        if ($pedidoItens->perc_desconto > 0) {
                            $pedidoItens->valor_desconto = (double) number_format((($pedidoItens->perc_desconto * 100) * $pedidoItens->valor_venda) / 100, 2);
                            $pedidoItens->valor_liquido = (double) number_format($pedidoItens->valor_venda - $pedidoItens->valor_desconto, 2);
                        } else {
                            $pedidoItens->valor_desconto = (double) 0;
                            $pedidoItens->valor_liquido = (double) $pedidoItens->valor_venda;
                        }
                    } else {
                        $pedidoItens->valor_liquido = $pedidoItens->valor_venda;
                    }
                    $pedidoItens->valor_liquido = (double) ($pedidoItens->valor_liquido * $pedidoItens->quantidade);
                    $pedidoItens->valor_total = (double) ($pedidoItens->valor_venda * $pedidoItens->quantidade);
                    $this->PedidosItens->save($pedidoItens);
                }
                $pedido = $this->Pedidos->get($pedido->id);
                $itens = $this->PedidosItens->find()->where(['pedido_id' => $pedido->id])->all();
                $pedido->valor_total = 0;
                $pedido->valor_desconto = 0;
                $pedido->valor_liquido = 0;
                if (count($itens) > 0) {
                    //`valor_venda`, `quantidade`, ``, `perc_desconto`, `valor_desconto`, `valor_liquido`, `created`, `modified`
                    foreach ($itens as $key => $value) {
                        $pedido->valor_total += (double) $value->valor_total;
                        $pedido->valor_desconto += (double) $value->valor_desconto;
                        $pedido->valor_liquido += (double) $value->valor_liquido;
                    }
                }
                $this->Pedidos->save($pedido);
                echo json_encode($pedido);
                exit;
            }

            /**
             * Delete method
             *
             * @param string|null $id Pedido id.
             * @return \Cake\Network\Response|null Redirects to index.
             * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
             */
            public function delete($id = null) {
                $this->request->allowMethod(['post', 'delete']);
                $pedido = $this->Pedidos->get($id);
                if ($this->Pedidos->delete($pedido)) {
                    $this->Flash->success(__('Registro excluido com sucesso.'));
                } else {
                    $this->Flash->error(__('Erro ao excluir o registro.'));
                }
                return $this->redirect(['action' => 'index']);
            }

        }
        