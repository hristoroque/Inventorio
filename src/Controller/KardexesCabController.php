<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * KardexesCab Controller
 *
 * @property \App\Model\Table\KardexesCabTable $KardexesCab
 *
 * @method \App\Model\Entity\KardexesCab[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KardexesCabController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles']
        ];
        $kardexesCab = $this->paginate($this->KardexesCab);

        $this->set(compact('kardexesCab'));
    }

    /**
     * View method
     *
     * @param string|null $id Kardexes Cab id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $kardexesCab = $this->KardexesCab->get($id, [
            'contain' => ['Articles']
        ]);

        $this->set('kardexesCab', $kardexesCab);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $kardexesCab = $this->KardexesCab->newEntity();
        if ($this->request->is('post')) {
            $kardexesCab = $this->KardexesCab->patchEntity($kardexesCab, $this->request->getData());
            if ($this->KardexesCab->save($kardexesCab)) {
                $this->Flash->success(__('The kardexes cab has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kardexes cab could not be saved. Please, try again.'));
        }
        $articles = $this->KardexesCab->Articles->find('list', ['limit' => 200]);
        $this->set(compact('kardexesCab', 'articles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Kardexes Cab id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $kardexesCab = $this->KardexesCab->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $kardexesCab = $this->KardexesCab->patchEntity($kardexesCab, $this->request->getData());
            if ($this->KardexesCab->save($kardexesCab)) {
                $this->Flash->success(__('The kardexes cab has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kardexes cab could not be saved. Please, try again.'));
        }
        $articles = $this->KardexesCab->Articles->find('list', ['limit' => 200]);
        $this->set(compact('kardexesCab', 'articles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Kardexes Cab id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $kardexesCab = $this->KardexesCab->get($id);
        if ($this->KardexesCab->delete($kardexesCab)) {
            $this->Flash->success(__('The kardexes cab has been deleted.'));
        } else {
            $this->Flash->error(__('The kardexes cab could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
