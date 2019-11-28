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
}
