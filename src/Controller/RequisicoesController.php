<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Requisicoes Controller
 *
 * @property \App\Model\Table\RequisicoesTable $Requisicoes
 */
class RequisicoesController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('titulo_pagina', 'Requisições');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Produtos']
        ];
        $requisicoes = $this->paginate($this->Requisicoes);

        $this->set(compact('requisicoes'));
        $this->set('_serialize', ['requisicoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Requisico id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $requisico = $this->Requisicoes->get($id, [
            'contain' => ['Produtos']
        ]);

        $this->set('requisico', $requisico);
        $this->set('_serialize', ['requisico']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $requisico = $this->Requisicoes->newEntity();
        if ($this->request->is('post')) {
            $requisico = $this->Requisicoes->patchEntity($requisico, $this->request->data);
            if ($this->Requisicoes->save($requisico)) {
                $this->Flash->success(__('The requisico has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requisico could not be saved. Please, try again.'));
            }
        }
        $produtos = $this->Requisicoes->Produtos->find('list');
        $this->set(compact('requisico', 'produtos'));
        $this->set('_serialize', ['requisico']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requisico id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $requisico = $this->Requisicoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requisico = $this->Requisicoes->patchEntity($requisico, $this->request->data);
            if ($this->Requisicoes->save($requisico)) {
                $this->Flash->success(__('The requisico has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The requisico could not be saved. Please, try again.'));
            }
        }
        $produtos = $this->Requisicoes->Produtos->find('list');
        $this->set(compact('requisico', 'produtos'));
        $this->set('_serialize', ['requisico']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requisico id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $requisico = $this->Requisicoes->get($id);
        if ($this->Requisicoes->delete($requisico)) {
            $this->Flash->success(__('The requisico has been deleted.'));
        } else {
            $this->Flash->error(__('The requisico could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
