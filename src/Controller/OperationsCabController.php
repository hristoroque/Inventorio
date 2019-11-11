<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\OperationsCab;
use App\Model\Entity\OperationsDet;

/**
 * OperationsCab Controller
 *
 * @property \App\Model\Table\OperationsCabTable $OperationsCab 
 * @method \App\Model\Entity\OperationsCab[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OperationsCabController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'OperationsTypes']
        ];
        $operationsCab = $this->paginate($this->OperationsCab);

        $this->set(compact('operationsCab'));
    }

    /**
     * View method
     *
     * @param string|null $id Operations Cab id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operationsCab = $this->OperationsCab->get($id, [
            'contain' => ['Users', 'OperationsTypes']
        ]);

        $this->set('operationsCab', $operationsCab);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {        
        $operationsCab = $this->OperationsCab->newEntity();
        if ($this->request->is('post')) {
            $operationsCab = $this->OperationsCab->patchEntity($operationsCab, $this->request->getData());
            echo $operationsCab;
            $ope_cab = new OperationsCab;
            $ope_cab->user_id = $operationsCab->user_id;
            if( $operationsCab->operation_type == 'comprar')
                $ope_cab->operation_type_id = 1;
            else if( $operationsCab->operation_type == 'vender')
                $ope_cab->operation_type_id = 2;
            else 
                $ope_cab->operation_type_id = 1;
            echo $ope_cab;

            $ope_det = new OperationsDet;            
            $ope_det->article_id = $operationsCab->article_id;
            $ope_det->quantity = $operationsCab->quantity;
            echo($ope_det);

            if ($this->OperationsCab->save($ope_cab)) {
                $this->Flash->success(__('The operations cab has been saved.'));
                $last_id=$ope_cab->id; 
                //echo $last_id;
                $ope_det->operation_cab_id = $last_id;
                $this->loadModel('OperationsDet');
                $this->OperationsDet->save($ope_det);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The operations cab could not be saved. Please, try again.'));
        }
        $users = $this->OperationsCab->Users->find('list', ['limit' => 200]);
        $operationsTypes = $this->OperationsCab->OperationsTypes->find('list', ['limit' => 200]);
        $this->loadModel('Articles');
        $articles = $this->Articles->find('list', ['limit' => 200]);
        $this->set(compact('operationsCab', 'users', 'operationsTypes', 'articles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Operations Cab id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operationsCab = $this->OperationsCab->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operationsCab = $this->OperationsCab->patchEntity($operationsCab, $this->request->getData());
            if ($this->OperationsCab->save($operationsCab)) {
                $this->Flash->success(__('The operations cab has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The operations cab could not be saved. Please, try again.'));
        }
        $users = $this->OperationsCab->Users->find('list', ['limit' => 200]);
        $operationsTypes = $this->OperationsCab->OperationsTypes->find('list', ['limit' => 200]);
        $this->set(compact('operationsCab', 'users', 'operationsTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Operations Cab id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operationsCab = $this->OperationsCab->get($id);
        if ($this->OperationsCab->delete($operationsCab)) {
            $this->Flash->success(__('The operations cab has been deleted.'));
        } else {
            $this->Flash->error(__('The operations cab could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
