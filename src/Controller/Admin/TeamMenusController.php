<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * TeamMenus Controller
 *
 * @property \App\Model\Table\TeamMenusTable $TeamMenus
 */
class TeamMenusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('admin');

        $teamMenus = $this->paginate($this->TeamMenus);

        $this->set(compact('teamMenus'));
        $this->set('_serialize', ['teamMenus']);
    }

    /**
     * View method
     *
     * @param string|null $id Team Menu id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teamMenu = $this->TeamMenus->get($id, [
            'contain' => ['Teams']
        ]);

        $this->set('teamMenu', $teamMenu);
        $this->set('_serialize', ['teamMenu']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->viewBuilder()->layout('admin');
        $teamMenu = $this->TeamMenus->newEntity();
        if ($this->request->is('post')) {
            $teamMenu = $this->TeamMenus->patchEntity($teamMenu, $this->request->data);
            if ($this->TeamMenus->save($teamMenu)) {
                $this->Flash->success(__('The team menu has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The team menu could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('teamMenu'));
        $this->set('_serialize', ['teamMenu']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Team Menu id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teamMenu = $this->TeamMenus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teamMenu = $this->TeamMenus->patchEntity($teamMenu, $this->request->data);
            if ($this->TeamMenus->save($teamMenu)) {
                $this->Flash->success(__('The team menu has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The team menu could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('teamMenu'));
        $this->set('_serialize', ['teamMenu']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Team Menu id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teamMenu = $this->TeamMenus->get($id);
        if ($this->TeamMenus->delete($teamMenu)) {
            $this->Flash->success(__('The team menu has been deleted.'));
        } else {
            $this->Flash->error(__('The team menu could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
