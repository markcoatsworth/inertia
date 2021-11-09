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
        $years = $this->Events->find()->select(['year' => 'DISTINCT YEAR(Events.date)'])->order(['year' => 'DESC']);
        $this->set(compact('years'));
        $selectedYear = $this->request->getQuery('year');
        if (empty($selectedYear)) {
            $selectedYear = date('Y');
        }
        $this->set('selectedYear', $selectedYear);
        $events = $this->Events->find('all', array('conditions' => array('YEAR(Events.date)' => $selectedYear), 'order' => 'date DESC'));
        //$events = $this->Events->find()->select(['YEAR(Events.date)' => $selectedYear])->order('date DESC');
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
            $eventData = $this->request->getData();
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
                $this->Flash->success('This event has been updated.');
            }
            else {
                $this->Flash->error('This event could not be updated. Please try again.');
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
            $this->Flash->success(__('The event has been deleted.'));
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function history()
    {
        $events = $this->Events->find('all', ['conditions' => array('date <= ' => date("Y-m-d")), 'order' => 'date DESC']);
        $this->set(compact('events'));
    }
}

?>
