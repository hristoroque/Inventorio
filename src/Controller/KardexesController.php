<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Kardexes Controller
 *
 * @property \App\Model\Table\KardexesTable $Kardexes
 *
 * @method \App\Model\Entity\Kardex[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KardexesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $kardexes = $this->paginate($this->Kardexes);

        $this->set(compact('kardexes'));
    }

    /**
     * View method
     *
     * @param string|null $id Kardex id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $kardex = $this->Kardexes->get($id, [
            'contain' => ['Users', 'Articles']
        ]);

        $this->set('kardex', $kardex);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $kardex = $this->Kardexes->newEntity();
        if ($this->request->is('post')) {
            $kardex = $this->Kardexes->patchEntity($kardex, $this->request->getData());
            if ($this->Kardexes->save($kardex)) {
                $this->Flash->success(__('The kardex has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kardex could not be saved. Please, try again.'));
        }
        $users = $this->Kardexes->Users->find('list', ['limit' => 200]);
        $articles = $this->Kardexes->Articles->find('list', ['limit' => 200]);
        $this->set(compact('kardex', 'users', 'articles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Kardex id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $kardex = $this->Kardexes->get($id, [
            'contain' => ['Articles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $kardex = $this->Kardexes->patchEntity($kardex, $this->request->getData());
            if ($this->Kardexes->save($kardex)) {
                $this->Flash->success(__('The kardex has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kardex could not be saved. Please, try again.'));
        }
        $users = $this->Kardexes->Users->find('list', ['limit' => 200]);
        $articles = $this->Kardexes->Articles->find('list', ['limit' => 200]);
        $this->set(compact('kardex', 'users', 'articles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Kardex id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $kardex = $this->Kardexes->get($id);
        if ($this->Kardexes->delete($kardex)) {
            $this->Flash->success(__('The kardex has been deleted.'));
        } else {
            $this->Flash->error(__('The kardex could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
