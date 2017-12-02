<?php

namespace App\Controller;

class PhotosController extends AppController
{

  public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

  public function index()
    {
        $this->loadComponent('Paginator');
        $photos = $this->Paginator->paginate($this->Photos->find());
        $this->set(compact('photos'));

        $query = $this->Photos->find('all')->contain(['Metadata']);
        $this->set(compact('query'));
    }

    public function view($name = null)
    {
      $photo = $this->Photos->findByName($name)->firstOrFail();
      $this->set(compact('photo'));
    }

    public function add()
    {
        $photo = $this->Photos->newEntity();
        if ($this->request->is('post')) {
            $photo = $this->Photos->patchEntity($photo, $this->request->getData());

            if ($this->Photos->save($photo)) {
                $this->Flash->success(__('Your photo has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your photo.'));
        }
        $this->set('photo', $photo);
    }

  public function addLike()
    {
      $id = $this->request->data['id'];
      $this->loadModel('Photos');
      $this->Photos->id = $id;
      $this->Photos->updateAll(array('Photos.likes' => 'Photos.likes + 1'), array('Photos.id' => $id));
    }

}
