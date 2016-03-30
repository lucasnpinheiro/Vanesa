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
        $this->set('titulo_pagina', 'Vanesa Sorvetes');

        $this->viewBuilder()->layout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                if ($user['root'] === 1) {
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'Pessoas', 'action' => 'index']);
                } else {
                    $dados = unserialize(\Cake\Core\Configure::read('Parametros.CAcesso'));
                    $md5 = $dados['md5'];
                    $dados['md5'] = '';
                    $token = $dados['token'];
                    $dados['token'] = '';

                    $this->loadModel('Empresas');
                    $this->loadModel('Parametros');
                    $Empresas = $this->Empresas->find()->first();
                    if ($Empresas->nome != $dados['cliente']) {
                        $dados['ativo'] = 0;
                    }
                    if ($Empresas->cnpj != $dados['cnpj']) {
                        $dados['ativo'] = 0;
                    }
                    if ($md5 != md5(serialize($dados))) {
                        $dados['ativo'] = 0;
                    } else {
                        $dados['md5'] = md5(serialize($dados));
                    }
                    if ($token != base64_encode(serialize($dados))) {
                        $dados['ativo'] = 0;
                    }

                    if (date('YmdHis') > \Cake\Core\Configure::read('Parametros.CAcessoData')) {
                        $parametro = $this->Parametros->get(6);
                        $parametro->valor = date('YmdHis');
                        $this->Parametros->save($parametro);
                    } else {
                        $dados['ativo'] = 0;
                    }
                    $datetime1 = new \DateTime(date('Y-m-d'));
                    $datetime2 = new \DateTime(\Cake\Core\Configure::read('Parametros.CAcessoDataValidade'));
                    $interval = $datetime1->diff($datetime2);
                    if ($interval === false OR $interval->invert != 0) {
                        $dados['ativo'] = 0;
                    }
                    if ($dados['ativo'] === 0) {
                        $dados = unserialize(\Cake\Core\Configure::read('Parametros.CAcesso'));
                        $dados['ativo'] = 0;
                        $parametro = $this->Parametros->get(5);
                        $parametro->valor = serialize($dados);
                        $this->Parametros->save($parametro);
                        $this->Flash->error(__('Validade de uso do software expirou, por favor entrar em contato com o desenvolvedor do software.'));
                    } else {
                        $this->Auth->setUser($user);
                        return $this->redirect(['controller' => 'Pessoas', 'action' => 'index']);
                    }
                }
            } else {
                $this->Flash->error(__('Usuário ou senha invalidos.'));
            }
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
