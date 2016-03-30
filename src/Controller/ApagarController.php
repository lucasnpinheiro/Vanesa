<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Apagar Controller
 *
 * @property \App\Model\Table\ApagarTable $Apagar
 */
class ApagarController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('titulo_pagina', 'A Pagar');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))->contain(['Pessoas']);
        $this->set('apagar', $this->paginate($query));
        $this->set('_serialize', ['apagar']);
    }

    /**
     * View method
     *
     * @param string|null $id Apagar id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $apagar = $this->Apagar->get($id, [
            'contain' => ['Pessoas']
        ]);

        $this->set('apagar', $apagar);
        $this->set('_serialize', ['apagar']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $apagar = $this->Apagar->newEntity();
        if ($this->request->is('post')) {
            $apagar = $this->Apagar->patchEntity($apagar, $this->request->data);
            if ($this->Apagar->save($apagar)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O registro não pôde ser salvo. Por favor tente novamente.'));
            }
        }
        $this->set(compact('apagar'));
        $this->set('_serialize', ['apagar']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Apagar id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $apagar = $this->Apagar->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $apagar = $this->Apagar->patchEntity($apagar, $this->request->data);
            if ($this->Apagar->save($apagar)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O registro não pôde ser salvo. Por favor tente novamente.'));
            }
        }
        $this->set(compact('apagar'));
        $this->set('_serialize', ['apagar']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Apagar id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $apagar = $this->Apagar->get($id);
        if ($this->Apagar->delete($apagar)) {
            $this->Flash->success(__('Registro excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o registro.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
