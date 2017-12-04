<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Blog Controller
 *
 * @property \App\Model\Table\BlogTable $Blog
 *
 * @method \App\Model\Entity\Blog[] paginate($object = null, array $settings = [])
 */
class BlogController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->set('authUser', $this->Auth->user());
        $blog = $this->paginate($this->Blog);

        $this->set(compact('blog'));
        $this->set('_serialize', ['blog']);
    }

    /**
     * View method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('authUser', $this->Auth->user());
        $blog = $this->Blog->get($id, [
            'contain' => []
        ]);

        $this->set('blog', $blog);
        $this->set('_serialize', ['blog']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->set('authUser', $this->Auth->user());
        $blog = $this->Blog->newEntity();
        if ($this->request->is('post')) {
            $blog = $this->Blog->patchEntity($blog, $this->request->getData());
            if ($this->Blog->save($blog)) {
                $this->Flash->success(__('El evento fue agregado'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El evento no pudo agregarse, intente de nuevo'));
        }
        $this->set(compact('blog'));
        $this->set('_serialize', ['blog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->set('authUser', $this->Auth->user());
        $blog = $this->Blog->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blog = $this->Blog->patchEntity($blog, $this->request->getData());
            if ($this->Blog->save($blog)) {
                $this->Flash->success(__('El evento ha sido actualizado'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El evento no pudo actualizarse, intente de nuevo'));
        }
        $this->set(compact('blog'));
        $this->set('_serialize', ['blog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->set('authUser', $this->Auth->user());
        $this->request->allowMethod(['post', 'delete']);
        $blog = $this->Blog->get($id);
        if ($this->Blog->delete($blog)) {
            $this->Flash->success(__('El evento ha sido eliminado'));
        } else {
            $this->Flash->error(__('El evento no pudo eliminarse, intente de nuevo'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
