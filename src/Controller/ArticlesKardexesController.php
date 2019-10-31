<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArticlesKardexes Controller
 *
 * @property \App\Model\Table\ArticlesKardexesTable $ArticlesKardexes
 *
 * @method \App\Model\Entity\ArticlesKardex[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesKardexesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles', 'Kardexes']
        ];
        $articlesKardexes = $this->paginate($this->ArticlesKardexes);

        $this->set(compact('articlesKardexes'));
    }

    /**
     * View method
     *
     * @param string|null $id Articles Kardex id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlesKardex = $this->ArticlesKardexes->get($id, [
            'contain' => ['Articles', 'Kardexes']
        ]);

        $this->set('articlesKardex', $articlesKardex);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlesKardex = $this->ArticlesKardexes->newEntity();
        if ($this->request->is('post')) {
            $articlesKardex = $this->ArticlesKardexes->patchEntity($articlesKardex, $this->request->getData());
            if ($this->ArticlesKardexes->save($articlesKardex)) {
                $this->Flash->success(__('The articles kardex has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles kardex could not be saved. Please, try again.'));
        }
        $articles = $this->ArticlesKardexes->Articles->find('list', ['limit' => 200]);
        $kardexes = $this->ArticlesKardexes->Kardexes->find('list', ['limit' => 200]);
        $this->set(compact('articlesKardex', 'articles', 'kardexes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Articles Kardex id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlesKardex = $this->ArticlesKardexes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlesKardex = $this->ArticlesKardexes->patchEntity($articlesKardex, $this->request->getData());
            if ($this->ArticlesKardexes->save($articlesKardex)) {
                $this->Flash->success(__('The articles kardex has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles kardex could not be saved. Please, try again.'));
        }
        $articles = $this->ArticlesKardexes->Articles->find('list', ['limit' => 200]);
        $kardexes = $this->ArticlesKardexes->Kardexes->find('list', ['limit' => 200]);
        $this->set(compact('articlesKardex', 'articles', 'kardexes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Articles Kardex id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesKardex = $this->ArticlesKardexes->get($id);
        if ($this->ArticlesKardexes->delete($articlesKardex)) {
            $this->Flash->success(__('The articles kardex has been deleted.'));
        } else {
            $this->Flash->error(__('The articles kardex could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
