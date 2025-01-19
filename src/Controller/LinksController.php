<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Cache\Cache;

/**
 * Links Controller
 *
 * @property \App\Model\Table\LinksTable $Links
 */
class LinksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Links->find();
        $links = $this->paginate($query);

        $this->set(compact('links'));
    }

    /**
     * View method
     *
     * @param string|null $id Link id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $link = $this->Links->get($id, contain: []);
        $this->set(compact('link'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $link = $this->Links->newEmptyEntity();
        if ($this->request->is('post')) {
            $link = $this->Links->patchEntity($link, $this->request->getData());
            $link->setShortId();
            if ($this->Links->save($link)) {
                $this->Flash->success(__('The link has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The link could not be saved. Please, try again.'));
        }
        $this->set(compact('link'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Link id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $link = $this->Links->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $link = $this->Links->patchEntity($link, $this->request->getData());
            if ($this->Links->save($link)) {
                $this->Flash->success(__('The link has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The link could not be saved. Please, try again.'));
        }
        $this->set(compact('link'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Link id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $link = $this->Links->get($id);
        if ($this->Links->delete($link)) {
            $this->Flash->success(__('The link has been deleted.'));
        } else {
            $this->Flash->error(__('The link could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function l($shortId) {
        $link = Cache::remember($shortId . '-cache', function () use ($shortId) {
            return $this->Links->find()->where(['short_id' => $shortId])->first();
        }, '__long_links_cacech__');
        
        
        return $this->redirect($link->url);
    }
}
