<?php
// src/Controller/EventsController.php

namespace App\Controller;

use Intervention\Image\ImageManager;

class EventsController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['history', 'view']);
    }

    public function index()
    {
        $this->viewBuilder()->setLayout('admin');
        $events = $this->Events->find('all', ['order' => 'date DESC']);
        $this->set(compact('events'));
    }

    public function view($id = null)
    {
        $event = $this->Events->findById($id)->firstOrFail();
        $this->set(compact('event'));
    }

    public function add($id = null)
    {
        $this->viewBuilder()->setLayout('admin');
        $event = $this->Events->newEmptyEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('This event has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event could not be saved. Please try again.'));
        }
        $this->set(compact('event'));
    }

    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('admin');
        $event = $this->Events->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $flyerFile = $this->request->getData('flyer')->getClientFilename();
            if (!empty($flyerFile) && isset($flyerFile)) {
                // Flyer image upload
                $fileobject = $this->request->getData('flyer');
                $uploadPath = '../uploads/';
                $destination = $uploadPath.$flyerFile;
                $fileobject->moveTo($destination);

                // Flyer image resizes
                $manager = new ImageManager(array('driver' => 'imagick'));
                $largeImage = $manager->make($destination)->widen(325);
                $largeImage->save('../webroot/img/Events/'.$flyerFile);
                $mediumImage = $manager->make($destination)->widen(250);
                $mediumImage->save('../webroot/img/Events/medium/'.$flyerFile);
                $smallImage = $manager->make($destination)->widen(200);
                $smallImage->save('../webroot/img/Events/tnails/'.$flyerFile);

                // Massage image upload data and save it
                $eventData = $this->request->getData();
                $eventData['flyer'] = $fileobject->getClientFilename();
                $event = $this->Events->patchEntity($event, $eventData);
            }
            if ($this->Events->save($event)) {
                $this->Flash->success(__('This event has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('This event could not be updated to $destination. Please try again.'));
        }
        $this->set(compact('event'));
    }

    public function history()
    {
        $events = $this->Events->find('all', ['conditions' => array('date <= ' => date("Y-m-d")), 'order' => 'date DESC']);
        $this->set(compact('events'));
    }
}

?>