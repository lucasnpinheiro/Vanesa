<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Pessoas Controller
 *
 * @property \App\Model\Table\PessoasTable $Pessoas
 */
class PessoasController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('titulo_pagina', 'Pessoas');
    }

    /**
     * Login method
     *
     * @return void
     */
    public function login() {
        $this->set('titulo_pagina', 'Vanessa Sorvetes');

        $this->viewBuilder()->layout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'Pessoas', 'action' => 'index']);
            }
            $this->Flash->error(__('Usuário ou senha invalidos.'));
        } else {
            if (!is_null($this->Auth->user())) {
                return $this->redirect(['controller' => 'Pessoas', 'action' => 'index']);
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        
    }

}
