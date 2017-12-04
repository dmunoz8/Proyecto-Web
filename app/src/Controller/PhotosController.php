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
        $this->set('authUser', $this->Auth->user());
        $this->loadComponent('Paginator');
        $photos = $this->Paginator->paginate($this->Photos->find());
        $this->set(compact('photos'));

        $query = $this->Photos->find('all')->contain(['Metadata']);
        $this->set(compact('query'));
    }

    public function view($name = null)
    {
      $this->set('authUser', $this->Auth->user());
      $photo = $this->Photos->findByName($name)->firstOrFail();
      $this->set(compact('photo'));
    }

    public function add()
    {
        $this->set('authUser', $this->Auth->user());
        $settings = array();
        $ids = array();

        $this->loadModel('Metadata');
        $query = $this->Metadata->find('all');

        foreach ($query as $row) {
          $pref = $row->preferences ."," .$row->camera ."," .$row->lens ."," .$row->shutterSpeed ."," .$row->aperture ."," .$row->ISO;
          array_push($settings, $pref);

          array_push($ids, $row->preferences);
        }
        $results = $query->all();
        $data = $results->toArray();
        $data = $query->toArray();
        $this->set(compact('settings'));
        $this->set(compact('ids'));

        $photo = $this->Photos->newEntity();
        if ($this->request->is('post')) {


            $photo = $this->Photos->patchEntity($photo, $this->request->getData());

            switch($photo->tags)
            {
              case 0:
                $photo->tags = 'Paisaje';
                break;

                case 1:
                  $photo->tags = 'Urbano';
                  break;

                  case 2:
                    $photo->tags = 'Arquitectura';
                    break;

                    case 3:
                      $photo->tags = 'Blanco & Negro';
                      break;

                      case 4:
                        $photo->tags = 'Retrato';
                        break;
            }

            if ($this->Photos->save($photo)) {
                $this->Flash->success(__('Su foto ha sido agregada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Su foto no pudo agregarse'));
        }
        $this->set('photo', $photo);
    }

    /**
     * Edit method
     *
     * @param string|null $id Photos id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
      $this->set('authUser', $this->Auth->user());
      $settings = array();
      $ids = array();

      $this->loadModel('Metadata');
      $query = $this->Metadata->find('all');

      foreach ($query as $row) {
        $pref = $row->preferences ."," .$row->camera ."," .$row->lens ."," .$row->shutterSpeed ."," .$row->aperture ."," .$row->ISO;
        array_push($settings, $pref);

        array_push($ids, $row->preferences);
      }
      $results = $query->all();
      $data = $results->toArray();
      $data = $query->toArray();
      $this->set(compact('settings'));
      $this->set(compact('ids'));

        $photo = $this->Photos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $photo = $this->Photos->patchEntity($photo, $this->request->getData());

            $photo->metadata_id = $photo->metadata_id + 1;

            switch($photo->tags)
            {
              case 0:
                $photo->tags = 'Paisaje';
                break;

                case 1:
                  $photo->tags = 'Urbano';
                  break;

                  case 2:
                    $photo->tags = 'Arquitectura';
                    break;

                    case 3:
                      $photo->tags = 'Blanco & Negro';
                      break;

                      case 4:
                        $photo->tags = 'Retrato';
                        break;
            }

            if ($this->Photos->save($photo)) {
                $this->Flash->success(__('Su foto ha sido actualizada'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Su foto no pudo actualizarse, intente de nuevo.'));
        }
        $this->set(compact('photo'));
        $this->set('_serialize', ['photo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Photos id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->set('authUser', $this->Auth->user());
        $this->request->allowMethod(['post', 'delete']);
        $photo = $this->Photos->get($id);
        if ($this->Photos->delete($photo)) {
            $this->Flash->success(__('Su foto ha sido eliminada'));
        } else {
            $this->Flash->error(__('Su foto no pudo borrarse, intente de nuevo'));
        }

        return $this->redirect(['action' => 'index']);
    }

  public function addLike()
    {
      $this->set('authUser', $this->Auth->user());
      $id = $this->request->data['id'];
      $this->loadModel('Photos');
      $this->Photos->id = $id;
      $this->Photos->updateAll(array('Photos.likes' => 'Photos.likes + 1'), array('Photos.id' => $id));
    }

}
