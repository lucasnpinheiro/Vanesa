<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Grupos Controller
 *
 * @property \App\Model\Table\GruposTable $Grupos
 */
class GruposController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('titulo_pagina', 'Grupos');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $grupos = $this->paginate($this->Grupos);

        $this->set(compact('grupos'));
        $this->set('_serialize', ['grupos']);
    }

    /**
     * View method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $grupo = $this->Grupos->get($id, [
            'contain' => ['CaixasMovimentos']
        ]);

        $this->set('grupo', $grupo);
        $this->set('_serialize', ['grupo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $grupo = $this->Grupos->newEntity();
        if ($this->request->is('post')) {
            $grupo = $this->Grupos->patchEntity($grupo, $this->request->data);
            if ($this->Grupos->save($grupo)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O registro não pôde ser salvo. Por favor tente novamente.'));
            }
        }
        $this->set(compact('grupo'));
        $this->set('_serialize', ['grupo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $grupo = $this->Grupos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grupo = $this->Grupos->patchEntity($grupo, $this->request->data);
            if ($this->Grupos->save($grupo)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O registro não pôde ser salvo. Por favor tente novamente.'));
            }
        }
        $this->set(compact('grupo'));
        $this->set('_serialize', ['grupo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $grupo = $this->Grupos->get($id);
        if ($this->Grupos->delete($grupo)) {
            $this->Flash->success(__('Registro excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o registro.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
