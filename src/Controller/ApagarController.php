<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Apagar Controller
 *
 * @property \App\Model\Table\ApagarTable $Apagar
 */
class ApagarController extends AppController
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
        $apagar = $this->paginate($this->Apagar);

        $this->set(compact('apagar'));
        $this->set('_serialize', ['apagar']);
    }

    /**
     * View method
     *
     * @param string|null $id Apagar id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
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
    public function add()
    {
        $apagar = $this->Apagar->newEntity();
        if ($this->request->is('post')) {
            $apagar = $this->Apagar->patchEntity($apagar, $this->request->data);
            if ($this->Apagar->save($apagar)) {
                $this->Flash->success(__('The apagar has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The apagar could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->Apagar->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('apagar', 'pessoas'));
        $this->set('_serialize', ['apagar']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Apagar id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $apagar = $this->Apagar->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $apagar = $this->Apagar->patchEntity($apagar, $this->request->data);
            if ($this->Apagar->save($apagar)) {
                $this->Flash->success(__('The apagar has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The apagar could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->Apagar->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('apagar', 'pessoas'));
        $this->set('_serialize', ['apagar']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Apagar id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $apagar = $this->Apagar->get($id);
        if ($this->Apagar->delete($apagar)) {
            $this->Flash->success(__('The apagar has been deleted.'));
        } else {
            $this->Flash->error(__('The apagar could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
