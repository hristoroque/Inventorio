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
            'contain' => ['Articles','KardexesDet']
        ]);

        $this->set('kardexesCab', $kardexesCab);
    }
}
