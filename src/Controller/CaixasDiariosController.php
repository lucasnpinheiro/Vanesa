<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * CaixasDiarios Controller
 *
 * @property \App\Model\Table\CaixasDiariosTable $CaixasDiarios
 */
class CaixasDiariosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('titulo_pagina', 'Caixas Diarios');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $query = $this->CaixasDiarios->find('search', $this->CaixasDiarios->filterParams($this->request->query))->order(['data' => 'DESC'])->contain(['Pessoas', 'Terminais']);
        $this->set('caixasDiarios', $this->paginate($query));
        $this->set('_serialize', ['caixasDiarios']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $caixasDiario = $this->CaixasDiarios->newEntity();
        if ($this->request->is('post')) {
            $caixasDiario = $this->CaixasDiarios->patchEntity($caixasDiario, $this->request->data);
            $find = $this->CaixasDiarios->findByDataAndTerminalAndPessoaId($caixasDiario->data, $caixasDiario->terminal, $caixasDiario->pessoa_id)->first();
            if (count($find) > 0) {
                $this->Flash->error(__('Já existe um caixa aberto com este dados.'));
            } else {
                if ($this->CaixasDiarios->save($caixasDiario)) {
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('O registro não pôde ser salvo. Por favor tente novamente.'));
                }
            }
        }
        $terminais = $this->CaixasDiarios->Terminais->find('list');
        $this->set(compact('caixasDiario', 'pessoas', 'terminais'));
        $this->set('_serialize', ['caixasDiario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Caixas Diario id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $caixasDiario = $this->CaixasDiarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $caixasDiario = $this->CaixasDiarios->patchEntity($caixasDiario, $this->request->data);
            $find = $this->CaixasDiarios->findByDataAndTerminalAndPessoaId($caixasDiario->data, $caixasDiario->terminal, $caixasDiario->pessoa_id)->first();
            if (count($find) > 0 AND $find->id != $id) {
                $this->Flash->error(__('Já existe um caixa aberto com este dados.'));
            } else {
                if ($this->CaixasDiarios->save($caixasDiario)) {
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('O registro não pôde ser salvo. Por favor tente novamente.'));
                }
            }
        }
        $terminais = $this->CaixasDiarios->Terminais->find('list');
        $this->set(compact('caixasDiario', 'pessoas', 'terminais'));
        $this->set('_serialize', ['caixasDiario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Caixas Diario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $caixasDiario = $this->CaixasDiarios->get($id);
        if ($this->CaixasDiarios->delete($caixasDiario)) {
            $this->Flash->success(__('Registro excluido com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o registro.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
