<?php
// src/Controller/EventsController.php

namespace App\Controller;

use Intervention\Image\ImageManager;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Event\EventInterface;

class EventsController extends AppController
{
    public function generateSlug($event) {
        $slug = Text::slug($event['title']);
        if (!empty($event['date']) && isset($event['date'])) {
            $slug .= "-".date('Y-m-d', strtotime($event['date']));
        }
        if (!empty($event['city']) && isset($event['city'])) {
            $slug .= "-".Text::slug($event['city']);
        }
        if (!empty($event['venue']) && isset($event['venue'])) {
            $slug .= "-".Text::slug($event['venue']);
        }
        return $slug;
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['history', 'view']);
    }

    public function view($id = null)
    {
        $event = $this->Events->findById(intval($id))->first();
        if (!isset($event)) {
            $event = $this->Events->findBySlug(strval($id))->first();
        }
        $this->set(compact('event'));
    }

    public function add($id = null)
    {
        $this->viewBuilder()->setLayout('admin');
        $event = $this->Events->newEmptyEntity();
        if ($this->request->is('post')) {
            $eventData = $this->request->getData();
            // Add slug
            $eventData['slug'] = substr($this->generateSlug($eventData), 0, 191);
            // Flyer image
            $flyer = $this->request->getData('flyer');
            if ($flyer != null && $flyer->getError() != UPLOAD_ERR_NO_FILE) {
                $flyerFile = $flyer->getClientFilename();
                $eventData['flyer'] = $flyerFile;

                // Image upload
                $fileobject = $this->request->getData('flyer');
                $uploadPath = '../uploads/';
                $destination = $uploadPath.$flyerFile;
                $fileobject->moveTo($destination);

                // Image resizes
                $manager = new ImageManager(array('driver' => 'imagick'));
                $largeImage = $manager->make($destination)->widen(325);
                $largeImage->save('../webroot/img/Events/'.$flyerFile);
                $mediumImage = $manager->make($destination)->widen(250);
                $mediumImage->save('../webroot/img/Events/medium/'.$flyerFile);
                $smallImage = $manager->make($destination)->widen(200);
                $smallImage->save('../webroot/img/Events/tnails/'.$flyerFile);
            }
            else {
                $eventData['flyer'] = "";
            }
            $event = $this->Events->patchEntity($event, $eventData);
            if ($result = $this->Events->save($event)) {
                $this->Flash->success(__('This event ('.$result->title.') has been saved.'));
                return $this->redirect(['controller' => 'Events', 'action' => 'edit', $result->id]);
            }
            else {
                $this->Flash->error(__('The event could not be saved. Please try again.'));
            }
        }
        $this->set(compact('event'));
    }

    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('admin');
        $event = $this->Events->findBySlug(strval($id))->first();
        if (!isset($event)) {
            $event = $this->Events->findById(intval($id))->first();
        };
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventData = $this->request->getData();
            $flyer = $this->request->getData('flyer');

            // Did we just get a new image upload? If so, use that
            $newFlyerFile = $flyer->getClientFilename();
            if (!empty($newFlyerFile) && isset($newFlyerFile)) {
                $eventData['flyer'] = $newFlyerFile;
                $event = $this->Events->patchEntity($event, $eventData);
            }
            // Was there an existing file? If so, keep that and don't overwrite it
            $oldFlyerFile = $event['flyer'];
            if (!empty($oldFlyerFile) && isset($oldFlyerFile)) {
                $eventData['flyer'] = $oldFlyerFile;
                $event = $this->Events->patchEntity($event, $eventData);
            }
            // Image management
            if (!empty($newFlyerFile) && isset($newFlyerFile)) {
                // Flyer image upload
                $fileobject = $this->request->getData('flyer');
                $uploadPath = '../uploads/';
                $destination = $uploadPath.$newFlyerFile;
                $fileobject->moveTo($destination);

                // Flyer image resizes
                $manager = new ImageManager(array('driver' => 'imagick'));
                $largeImage = $manager->make($destination)->widen(325);
                $largeImage->save('../webroot/img/Events/'.$newFlyerFile);
                $mediumImage = $manager->make($destination)->widen(250);
                $mediumImage->save('../webroot/img/Events/medium/'.$newFlyerFile);
                $smallImage = $manager->make($destination)->widen(200);
                $smallImage->save('../webroot/img/Events/tnails/'.$newFlyerFile);
            }
            if ($this->Events->save($event)) {
                $this->Flash->success('This event ('.$event->title.') has been updated.');
            }
            else {
                $this->Flash->error('This event ('.$event->title.') could not be updated. Please try again.');
            }
        }
        $this->set(compact('event'));
    }
    
     /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('Event ('.$event->title.') has been deleted.'));
        } else {
            $this->Flash->error(__('Event ('.$event->title.') could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Pages', 'action' => 'admin']);
    }

    public function history()
    {
        $events = $this->Events->find('all', ['conditions' => array('date <= ' => date("Y-m-d")), 'order' => 'date DESC']);
        $this->set(compact('events'));
    }
}

?>
