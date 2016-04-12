<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * CaixasMovimentos Controller
 *
 * @property \App\Model\Table\CaixasMovimentosTable $CaixasMovimentos
 */
class CaixasMovimentosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('titulo_pagina', 'Caixas Movimentos');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id = null) {
        $this->loadModel('CaixasDiarios');
        $caixasDiarios = $this->CaixasDiarios->get($id);
        $caixasMovimento = $this->CaixasMovimentos->newEntity();
        $this->paginate = [];
        $caixasMovimentos = $this->paginate($this->CaixasMovimentos);

        $this->set(compact('caixasDiarios', 'caixasMovimento', 'caixasMovimentos'));
        $this->set('caixas_diario_id', $id);
        $this->set('_serialize', ['caixasMovimentos']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null) {
        $caixasMovimento = $this->CaixasMovimentos->newEntity();
        if ($this->request->is('post')) {
            $caixasMovimento = $this->CaixasMovimentos->patchEntity($caixasMovimento, $this->request->data);
            if ($this->CaixasMovimentos->save($caixasMovimento)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index', $caixasMovimento->caixas_diario_id]);
            } else {
                $this->Flash->error(__('O registro não pôde ser salvo. Por favor tente novamente.'));
            }
        }
        $this->set(compact('caixasMovimento'));
        $this->set('_serialize', ['caixasMovimento']);
    }

}
