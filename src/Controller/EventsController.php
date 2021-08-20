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
        $this->Authentication->addUnauthenticatedActions(['index', 'view']);
    }

    public function index()
    {
        $events = $this->Events->find('all', ['conditions' => array('date <= ' => date("Y-m-d")), 'order' => 'date DESC']);
        $this->set(compact('events'));
    }

    public function view($id = null)
    {
        $event = $this->Events->findById($id)->firstOrFail();
        $this->set(compact('event'));
    }
}

?>