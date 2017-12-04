<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Metadata Controller
 *
 * @property \App\Model\Table\MetadataTable $Metadata
 *
 * @method \App\Model\Entity\Metadata[] paginate($object = null, array $settings = [])
 */
class MetadataController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->set('authUser', $this->Auth->user());
        $metadata = $this->paginate($this->Metadata);

        $this->set(compact('metadata'));
        $this->set('_serialize', ['metadata']);
    }

    /**
     * View method
     *
     * @param string|null $id Metadata id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('authUser', $this->Auth->user());
        $metadata = $this->Metadata->get($id, [
            'contain' => []
        ]);

        $this->set('metadata', $metadata);
        $this->set('_serialize', ['metadata']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->set('authUser', $this->Auth->user());
        $metadata = $this->Metadata->newEntity();
        if ($this->request->is('post')) {
            $metadata = $this->Metadata->patchEntity($metadata, $this->request->getData());
            if ($this->Metadata->save($metadata)) {
                $this->Flash->success(__('Los metadatos han sido agregados.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Los metadatos no se agregaron, intente de nuevo'));
        }
        $this->set(compact('metadata'));
        $this->set('_serialize', ['metadata']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Metadata id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->set('authUser', $this->Auth->user());
        $metadata = $this->Metadata->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $metadata = $this->Metadata->patchEntity($metadata, $this->request->getData());
            if ($this->Metadata->save($metadata)) {
                $this->Flash->success(__('Los metadatos se actualizaron'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Los metadatos no se actualizaron, intente de nuevo'));
        }
        $this->set(compact('metadata'));
        $this->set('_serialize', ['metadata']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Metadata id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->set('authUser', $this->Auth->user());
        $this->request->allowMethod(['post', 'delete']);
        $metadata = $this->Metadata->get($id);
        if ($this->Metadata->delete($metadata)) {
            $this->Flash->success(__('El metadato ha sido borrado'));
        } else {
            $this->Flash->error(__('El metadato no pudo borrarse, intente de nuevo'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
