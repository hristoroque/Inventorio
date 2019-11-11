<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Article;
use App\Model\Entity\KardexesCab;
/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 * @property \App\Model\Table\KardexesCabTable $KardexesCab
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Providers', 'Categories']
        ];
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Providers', 'Categories', 'KardexesCab', 'OperationsDet']
        ]);

        $this->set('article', $article);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            //echo($article);
            $newarticle = new Article;
            $newarticle->provider_id = $article->provider_id;
            $newarticle->category_id = $article->category_id;
            $newarticle->buy_price = $article->buy_price;                
            $newarticle->sell_price = $article->sell_price;
            $newarticle->name = $article->name;
            $newarticle->description = $article->description;
            if($newarticle->description == '')
                $newarticle->description = 'ninguna';
            $newarticle->state = $article->state;                
            //echo($newarticle);
            
            $kardex_cab = new KardexesCab;
            $kardex_cab ->current_stock = $article ->current_stock;
            if($kardex_cab->current_stock == '')
                $kardex_cab->current_stock = 0;
            $kardex_cab ->current_balance = $article ->current_balance;
            if($kardex_cab->current_balance == '')
                $kardex_cab->current_balance = 0.0;
            //echo($kardex_cab);  

            if ($this->Articles->save($newarticle)) {
                $this->Flash->success(__('The article has been saved.'));
                $last_id=$newarticle->id; 
                //echo $last_id;
                $kardex_cab->article_id = $last_id;
                $this->loadModel('KardexesCab');
                $this->KardexesCab->save($kardex_cab);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $providers = $this->Articles->Providers->find('list', ['limit' => 200]);
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $this->set(compact('article', 'providers', 'categories'));
    }

    /** 
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $providers = $this->Articles->Providers->find('list', ['limit' => 200]);
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $this->set(compact('article', 'providers', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
