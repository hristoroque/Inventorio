<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\OperationsCab;
use App\Model\Entity\OperationsDet;
use App\Model\Entity\KardexesDet;
use Cake\Datasource\ConnectionManager;

/**
 * OperationsCab Controller
 *
 * @property \App\Model\Table\OperationsCabTable $OperationsCab 
 * @property \App\Model\Table\KardexesDetTable $KardexesDet 
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
            'contain' => ['Users', 'OperationsTypes','OperationsDet']
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
        
            
               
            // $operationsCab = $this->OperationsCab->patchEntity($operationsCab, $this->request->getData());
            // echo $operationsCab;
            
            // $ope_cab = new OperationsCab;
            // $ope_cab->user_id = $operationsCab->user_id;
            // if( $operationsCab->operation_type == 'comprar')
            //     $ope_cab->operation_type_id = 1;
            // else if( $operationsCab->operation_type == 'vender')
            //     $ope_cab->operation_type_id = 2;
            // else 
            //     $ope_cab->operation_type_id = 1;
            // //echo $ope_cab;

            // $ope_det = new OperationsDet;            
            // $ope_det->article_id = $operationsCab->article_id;
            // $ope_det->quantity = $operationsCab->quantity;
            // //echo($ope_det);
            
            // $connection = ConnectionManager::get('default');
            // $results_kardex = $connection->execute('select * from kardexes_cab where article_id = '.$operationsCab->article_id.'')->fetchAll('assoc');
            // $kardex_id = ($results_kardex[0]);
            // print_r($kardex_id);            
            // echo '</br>';

            // $results_article = $connection->execute('select * from articles where id = '.$operationsCab->article_id.'')->fetchAll('assoc');
            // print_r($results_article);

            // echo '</br>';
            // $kardex_det = new KardexesDet;
            // $kardex_det->kardex_cab_id = $results_kardex[0]['id'];
            // if( $operationsCab->operation_type == 'comprar'){            
            //     $kardex_det->entry_amount = $operationsCab->quantity;
            //     $kardex_det->entry_unit_price = $results_article[0]['buy_price'];
            //     $kardex_det->entry_total_price = $operationsCab->quantity*$results_article[0]['buy_price'];
            //     $kardex_det->output_amount = 0;
            //     $kardex_det->output_unit_price=0;
            //     $kardex_det->output_total_price=0;
            // }
            // if( $operationsCab->operation_type == 'vender'){            
            //     $kardex_det->entry_amount  = 0;
            //     $kardex_det->entry_unit_price = 0;
            //     $kardex_det->entry_total_price = 0;
            //     $kardex_det->output_amount = $operationsCab->quantity;
            //     $kardex_det->output_unit_price = $results_article[0]['sell_price'];;
            //     $kardex_det->output_total_price = $operationsCab->quantity*$results_article[0]['sell_price'];;
            // }
            // $kardex_det->existence_current_stock = $results_kardex[0]['current_stock'];
            // $kardex_det->existence_current_balance = $results_kardex[0]['current_balance'];
            // echo $kardex_det;
            
            // if ($this->OperationsCab->save($ope_cab)) {
            //     $this->Flash->success(__('The operations cab has been saved.'));
            //     $last_id=$ope_cab->id; 
            //     //echo $last_id;
            //     $ope_det->operation_cab_id = $last_id;
            //     $this->loadModel('OperationsDet');
            //     $this->OperationsDet->save($ope_det);

            //     $last_created=$ope_cab->created;             
            //     $kardex_det->date = $last_created;
            //     $this->loadModel('KardexesDet');
            //     $this->KardexesDet->save($kardex_det);

            // if( $operationsCab->operation_type == 'vender'){
            //     $connection->execute(' update kardexes_cab
            //     set current_stock = '.($results_kardex[0]['current_stock'] - $kardex_det->output_amount).',
            //         current_balance = '.($results_kardex[0]['current_balance'] + $kardex_det->output_total_price).', 
            //         modified = CURRENT_TIMESTAMP
            //     where id = '.$results_kardex[0]['id'].'');
            // }           
            
            // if( $operationsCab->operation_type == 'comprar'){
            //     $connection->execute(' update kardexes_cab
            //     set current_stock = '.($results_kardex[0]['current_stock'] + $kardex_det->entry_amount).', 
            //         current_balance = '.($results_kardex[0]['current_balance'] - $kardex_det->entry_total_price).', 
            //         modified = CURRENT_TIMESTAMP
            //     where id = '.$results_kardex[0]['id'].'');
            // }       

            //     return $this->redirect(['action' => 'index']);
            // }
            // $this->Flash->error(__('The operations cab could not be saved. Please, try again.'));
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

    public function accept()    
    {   
        
                      
        $this->request->allowMethod('ajax');   
        $myArr = $this->request->query('keyword');

        foreach ($myArr as $operationsCab){      
            //echo "</br>";
            $ope_cab = new OperationsCab;
            $ope_cab->user_id = $operationsCab[1];
            if( $operationsCab[2] == 'comprar')
                $ope_cab->operation_type_id = 1;
            else if( $operationsCab[2] == 'vender')
                $ope_cab->operation_type_id = 2;
            else 
                $ope_cab->operation_type_id = 1;
            //echo $ope_cab;
            
            $ope_det = new OperationsDet;            
            $ope_det->article_id = $operationsCab[3];
            $ope_det->quantity = $operationsCab[4];
            //echo($ope_det);
            
            $connection = ConnectionManager::get('default');
            $results_kardex = $connection->execute('select * from kardexes_cab where article_id = '.$operationsCab[3].'')->fetchAll('assoc');
            $kardex_id = ($results_kardex[0]);
            //print_r($kardex_id);            
            //echo '</br>';

            $results_article = $connection->execute('select * from articles where id = '.$operationsCab[3].'')->fetchAll('assoc');
            //print_r($results_article);

            // echo '</br>';
            $kardex_det = new KardexesDet;
            $kardex_det->kardex_cab_id = $results_kardex[0]['id'];
            if( $operationsCab[2] == 'comprar'){            
                $kardex_det->entry_amount = $operationsCab[4];
                $kardex_det->entry_unit_price = $results_article[0]['buy_price'];
                $kardex_det->entry_total_price = $operationsCab[4]*$results_article[0]['buy_price'];
                $kardex_det->output_amount = 0;
                $kardex_det->output_unit_price=0;
                $kardex_det->output_total_price=0;
            }
            if( $operationsCab[2] == 'vender'){            
                $kardex_det->entry_amount  = 0;
                $kardex_det->entry_unit_price = 0;
                $kardex_det->entry_total_price = 0;
                $kardex_det->output_amount = $operationsCab[4];
                $kardex_det->output_unit_price = $results_article[0]['sell_price'];;
                $kardex_det->output_total_price = $operationsCab[4]*$results_article[0]['sell_price'];;
            }
            $kardex_det->existence_current_stock = $results_kardex[0]['current_stock'];
            $kardex_det->existence_current_balance = $results_kardex[0]['current_balance'];
            //echo $kardex_det;
            
            if ($this->OperationsCab->save($ope_cab)) {
                $this->Flash->success(__('The operations cab has been saved.'));
                $last_id=$ope_cab->id; 
                //echo $last_id;
                $ope_det->operation_cab_id = $last_id;
                $this->loadModel('OperationsDet');
                $this->OperationsDet->save($ope_det);

                $last_created=$ope_cab->created;             
                $kardex_det->date = $last_created;
                $this->loadModel('KardexesDet');
                $this->KardexesDet->save($kardex_det);

                if( $operationsCab[2] == 'vender'){
                    $connection->execute(' update kardexes_cab
                    set current_stock = '.($results_kardex[0]['current_stock'] - $kardex_det->output_amount).',
                        current_balance = '.($results_kardex[0]['current_balance'] + $kardex_det->output_total_price).', 
                        modified = CURRENT_TIMESTAMP
                    where id = '.$results_kardex[0]['id'].'');
                }           
                
                if( $operationsCab[2] == 'comprar'){
                    $connection->execute(' update kardexes_cab
                    set current_stock = '.($results_kardex[0]['current_stock'] + $kardex_det->entry_amount).', 
                        current_balance = '.($results_kardex[0]['current_balance'] - $kardex_det->entry_total_price).', 
                        modified = CURRENT_TIMESTAMP
                    where id = '.$results_kardex[0]['id'].'');
                }       

                
            }
        }
        
        $mensaje = "Operacion exitosa!";        
        $this->set('mensaje', $mensaje);                
    }
}
