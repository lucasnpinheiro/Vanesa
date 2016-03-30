<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Parametros Controller
 *
 * @property \App\Model\Table\ParametrosTable $Parametros
 */
class ParametrosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('titulo_pagina', 'Parametros');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $parametro = $this->Parametros->newEntity();
        $query = $this->Parametros->find('search', $this->Parametros->filterParams($this->request->query));
        if ($this->Auth->user('root') != 1) {
            $query->where(['root' => 0]);
        }
        $this->set('parametros', $this->paginate($query));
        $this->set('parametro', $parametro);
        $this->set('_serialize', ['parametros']);
    }

    /**
     * Save method
     *
     * @param string|null $id Parametro id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function save() {
        if ($this->request->is(['patch', 'post', 'put'])) {
            foreach ($this->request->data('paramentros') as $key => $value) {
                $parametro = $this->Parametros->get($key);
                $parametro->valor = $value['valor'];
                $this->Parametros->save($parametro);
            }
        }
        $this->Flash->success(__('Registro Salvo com Sucesso.'));
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parametro id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $parametro = $this->Parametros->get($id);
        if ($this->Parametros->delete($parametro)) {
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function gerarDadosAcesso() {
        if ($this->Auth->user('root') === 1) {
            $this->loadModel('Empresas');
            $Empresas = $this->Empresas->find()->first();
            $dados = [
                'data_geracao' => date('Y-m-d'),
                'data_validade' => date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 45)),
                'cliente' => $Empresas->nome,
                'cnpj' => $Empresas->cnpj,
                'ativo' => 1,
                'md5' => '',
                'token' => '',
            ];
            $dados['md5'] = md5(serialize($dados));
            $dados['token'] = base64_encode(serialize($dados));
            $parametro = $this->Parametros->get(5);
            $parametro->valor = serialize($dados);
            $this->Parametros->save($parametro);
            $parametro = $this->Parametros->get(7);
            $parametro->valor = $dados['md5'];
            $this->Parametros->save($parametro);
            $parametro = $this->Parametros->get(11);
            $parametro->valor = $dados['data_validade'];
            $this->Parametros->save($parametro);
            return $this->redirect(['action' => 'index']);
        }
    }

}
