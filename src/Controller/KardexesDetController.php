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
}
