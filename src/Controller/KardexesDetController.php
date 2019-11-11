<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * KardexesDet Controller
 *
 * @property \App\Model\Table\KardexesDetTable $KardexesDet
 *
 * @method \App\Model\Entity\KardexesDet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KardexesDetController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['KardexesCab']
        ];
        $kardexesDet = $this->paginate($this->KardexesDet);

        $this->set(compact('kardexesDet'));
    }

    /**
     * View method
     *
     * @param string|null $id Kardexes Det id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $kardexesDet = $this->KardexesDet->get($id, [
            'contain' => ['KardexesCab']
        ]);

        $this->set('kardexesDet', $kardexesDet);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $kardexesDet = $this->KardexesDet->newEntity();
        if ($this->request->is('post')) {
            $kardexesDet = $this->KardexesDet->patchEntity($kardexesDet, $this->request->getData());
            if ($this->KardexesDet->save($kardexesDet)) {
                $this->Flash->success(__('The kardexes det has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kardexes det could not be saved. Please, try again.'));
        }
        $kardexesCab = $this->KardexesDet->KardexesCab->find('list', ['limit' => 200]);
        $this->set(compact('kardexesDet', 'kardexesCab'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Kardexes Det id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $kardexesDet = $this->KardexesDet->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $kardexesDet = $this->KardexesDet->patchEntity($kardexesDet, $this->request->getData());
            if ($this->KardexesDet->save($kardexesDet)) {
                $this->Flash->success(__('The kardexes det has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kardexes det could not be saved. Please, try again.'));
        }
        $kardexesCab = $this->KardexesDet->KardexesCab->find('list', ['limit' => 200]);
        $this->set(compact('kardexesDet', 'kardexesCab'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Kardexes Det id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $kardexesDet = $this->KardexesDet->get($id);
        if ($this->KardexesDet->delete($kardexesDet)) {
            $this->Flash->success(__('The kardexes det has been deleted.'));
        } else {
            $this->Flash->error(__('The kardexes det could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
