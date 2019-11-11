<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OperationsDet Controller
 *
 * @property \App\Model\Table\OperationsDetTable $OperationsDet
 *
 * @method \App\Model\Entity\OperationsDet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OperationsDetController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['OperationsCab', 'Articles']
        ];
        $operationsDet = $this->paginate($this->OperationsDet);

        $this->set(compact('operationsDet'));
    }

    /**
     * View method
     *
     * @param string|null $id Operations Det id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operationsDet = $this->OperationsDet->get($id, [
            'contain' => ['OperationsCab', 'Articles']
        ]);

        $this->set('operationsDet', $operationsDet);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operationsDet = $this->OperationsDet->newEntity();
        if ($this->request->is('post')) {
            $operationsDet = $this->OperationsDet->patchEntity($operationsDet, $this->request->getData());
            if ($this->OperationsDet->save($operationsDet)) {
                $this->Flash->success(__('The operations det has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The operations det could not be saved. Please, try again.'));
        }
        $operationsCab = $this->OperationsDet->OperationsCab->find('list', ['limit' => 200]);
        $articles = $this->OperationsDet->Articles->find('list', ['limit' => 200]);
        $this->set(compact('operationsDet', 'operationsCab', 'articles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Operations Det id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operationsDet = $this->OperationsDet->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operationsDet = $this->OperationsDet->patchEntity($operationsDet, $this->request->getData());
            if ($this->OperationsDet->save($operationsDet)) {
                $this->Flash->success(__('The operations det has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The operations det could not be saved. Please, try again.'));
        }
        $operationsCab = $this->OperationsDet->OperationsCab->find('list', ['limit' => 200]);
        $articles = $this->OperationsDet->Articles->find('list', ['limit' => 200]);
        $this->set(compact('operationsDet', 'operationsCab', 'articles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Operations Det id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operationsDet = $this->OperationsDet->get($id);
        if ($this->OperationsDet->delete($operationsDet)) {
            $this->Flash->success(__('The operations det has been deleted.'));
        } else {
            $this->Flash->error(__('The operations det could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
