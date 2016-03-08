<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Pessoas Controller
 *
 * @property \App\Model\Table\PessoasTable $Pessoas
 */
class FornecedoresController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('titulo_pagina', 'Fornecedores');
        $this->loadModel('Pessoas');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->loadModel('PessoasTipos');

        $find = $this->PessoasTipos->find('all')->where(['tipo' => 3])->all();
        $ids = [];
        foreach ($find as $key => $value) {
            $ids[] = $value->pessoa_id;
        }

        $query = $this->Pessoas->find('search', $this->Pessoas->filterParams($this->request->query));

        if (!empty($ids)) {
            $query->where(['id in' => $ids]);
        } else {
            $query->where(['id' => -1]);
        }
        if ($this->Auth->user('root') != 1) {
            $query->where(['root' => 0]);
        }
        $this->set('pessoas', $this->paginate($query));
        $this->set('_serialize', ['pessoas']);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $pessoa = $this->Pessoas->newEntity();
        if ($this->request->is('post')) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->data);
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('The pessoa has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pessoa'));
        $this->set('_serialize', ['pessoa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->data);
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('The pessoa has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pessoa'));
        $this->set('_serialize', ['pessoa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $pessoa = $this->Pessoas->get($id);
        if ($this->Pessoas->delete($pessoa)) {
            $this->Flash->success(__('The pessoa has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoa could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
