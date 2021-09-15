<?php
// src/Controller/EventsController.php

namespace App\Controller;

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
            $user = $this->Events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('This event has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('This event could not be updated. Please try again.'));
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