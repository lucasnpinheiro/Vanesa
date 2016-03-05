<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CaixasDiarios Controller
 *
 * @property \App\Model\Table\CaixasDiariosTable $CaixasDiarios
 */
class CaixasDiariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas']
        ];
        $caixasDiarios = $this->paginate($this->CaixasDiarios);

        $this->set(compact('caixasDiarios'));
        $this->set('_serialize', ['caixasDiarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Caixas Diario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $caixasDiario = $this->CaixasDiarios->get($id, [
            'contain' => ['Pessoas', 'CaixasMovimentos']
        ]);

        $this->set('caixasDiario', $caixasDiario);
        $this->set('_serialize', ['caixasDiario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $caixasDiario = $this->CaixasDiarios->newEntity();
        if ($this->request->is('post')) {
            $caixasDiario = $this->CaixasDiarios->patchEntity($caixasDiario, $this->request->data);
            if ($this->CaixasDiarios->save($caixasDiario)) {
                $this->Flash->success(__('The caixas diario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The caixas diario could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->CaixasDiarios->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('caixasDiario', 'pessoas'));
        $this->set('_serialize', ['caixasDiario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Caixas Diario id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $caixasDiario = $this->CaixasDiarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $caixasDiario = $this->CaixasDiarios->patchEntity($caixasDiario, $this->request->data);
            if ($this->CaixasDiarios->save($caixasDiario)) {
                $this->Flash->success(__('The caixas diario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The caixas diario could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->CaixasDiarios->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('caixasDiario', 'pessoas'));
        $this->set('_serialize', ['caixasDiario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Caixas Diario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $caixasDiario = $this->CaixasDiarios->get($id);
        if ($this->CaixasDiarios->delete($caixasDiario)) {
            $this->Flash->success(__('The caixas diario has been deleted.'));
        } else {
            $this->Flash->error(__('The caixas diario could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
