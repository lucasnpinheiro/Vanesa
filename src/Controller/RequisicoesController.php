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

        $query = $this->Requisicoes->find('search', $this->Requisicoes->filterParams($this->request->query))->contain(['Produtos']);
        $this->set('requisicoes', $this->paginate($query));
        $this->set('_serialize', ['requisicoes']);
        $this->set('produtos', $this->Requisicoes->Produtos->find('list'));
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
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O registro não pôde ser salvo. Por favor tente novamente.'));
            }
        }
        $_produtos = $this->Requisicoes->Produtos->find()->order(['nome' => 'asc'])->all();
        $produtos = [];
        foreach ($_produtos as $key => $value) {
            $produtos[$value->id] = $value->barra . ' | ' . $value->nome;
        }
        $this->set(compact('requisico', 'produtos'));
        $this->set('_serialize', ['requisico']);
    }

}
