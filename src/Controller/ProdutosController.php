<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Produtos Controller
 *
 * @property \App\Model\Table\ProdutosTable $Produtos
 */
class ProdutosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('titulo_pagina', 'Produtos');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $query = $this->Produtos->find('search', $this->Produtos->filterParams($this->request->query))->contain('GruposEstoques');
        $this->set('produtos', $this->paginate($query));
        $this->set('_serialize', ['produtos']);
    }

    public function verifica() {

        $find = $this->Produtos->find('all', [
                    'conditions' => [
                        $this->request->data('tipo') => $this->request->data('valor')
                    ]
                ])->first();
        if (empty($find)) {
            $retorno = [
                'cod' => 111
            ];
        } else {
            $retorno = [
                'cod' => 999,
                'id' => $find->id,
            ];
        }
        echo json_encode($retorno);
        exit;
    }

    /**
     * View method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $produto = $this->Produtos->get($id);
        $this->loadModel('GruposEstoques');
        $grupo = $this->GruposEstoques->get($produto->grupos_estoque_id);
        if ($grupo->estoque_global > 0) {
            $produto = $this->Produtos->get($grupo->estoque_global);
        }
        $this->set('produto', $produto);
        $this->set('_serialize', ['produto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $produto = $this->Produtos->newEntity();
        if ($this->request->is('post')) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->data);
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O registro não pôde ser salvo. Por favor tente novamente.'));
            }
        }
        $gruposEstoques = $this->Produtos->GruposEstoques->find('list');
        $this->set(compact('produto', 'gruposEstoques'));
        $this->set('_serialize', ['produto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $produto = $this->Produtos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->data);
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O registro não pôde ser salvo. Por favor tente novamente.'));
            }
        }
        $gruposEstoques = $this->Produtos->GruposEstoques->find('list');
        $this->set(compact('produto', 'gruposEstoques'));
        $this->set('_serialize', ['produto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $produto = $this->Produtos->get($id);
        if ($this->Produtos->delete($produto)) {
            $this->Flash->success(__('Registro excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o registro.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function relatorios() {
        if (!empty($this->request->data)) {
            $this->redirect($this->request->data);
        }
        $this->loadModel('GruposEstoques');

        $produto = $this->Produtos->find('search', $this->Produtos->filterParams($this->request->query))->where(['status' => 1])->order(['nome' => 'asc'])->all();

        $gruposEstoques = $this->GruposEstoques->find()->order(['nome' => 'asc'])->all();
        $this->set(compact('produto', 'gruposEstoques'));
        $this->set('_serialize', ['produto']);
    }

}
