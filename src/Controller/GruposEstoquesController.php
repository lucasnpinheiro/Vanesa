<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * GruposEstoques Controller
 *
 * @property \App\Model\Table\GruposEstoquesTable $GruposEstoques
 */
class GruposEstoquesController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('titulo_pagina', 'Grupos Estoques');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $query = $this->GruposEstoques->find('search', $this->GruposEstoques->filterParams($this->request->query))->contain(['Produtos']);
        $this->set('gruposEstoques', $this->paginate($query));
        $this->set('_serialize', ['gruposEstoques']);
    }

    /**
     * View method
     *
     * @param string|null $id Grupos Estoque id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $gruposEstoque = $this->GruposEstoques->get($id, [
            'contain' => []
        ]);

        $this->set('gruposEstoque', $gruposEstoque);
        $this->set('_serialize', ['gruposEstoque']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $gruposEstoque = $this->GruposEstoques->newEntity();
        if ($this->request->is('post')) {
            $gruposEstoque = $this->GruposEstoques->patchEntity($gruposEstoque, $this->request->data);
            if ($this->GruposEstoques->save($gruposEstoque)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O registro não pôde ser salvo. Por favor tente novamente.'));
            }
        }
        $this->loadModel('Produtos');
        $produto = $this->Produtos->find('list');
        $this->set(compact('gruposEstoque', 'produto'));
        $this->set('_serialize', ['gruposEstoque']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Grupos Estoque id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $gruposEstoque = $this->GruposEstoques->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gruposEstoque = $this->GruposEstoques->patchEntity($gruposEstoque, $this->request->data);
            if ($this->GruposEstoques->save($gruposEstoque)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O registro não pôde ser salvo. Por favor tente novamente.'));
            }
        }
        $this->loadModel('Produtos');
        $produto = $this->Produtos->find('list');
        $this->set(compact('gruposEstoque', 'produto'));
        $this->set('_serialize', ['gruposEstoque']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Grupos Estoque id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $gruposEstoque = $this->GruposEstoques->get($id);
        if ($this->GruposEstoques->delete($gruposEstoque)) {
            $this->Flash->success(__('Registro excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o registro.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
