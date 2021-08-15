<?php
// src/Controller/EventsController.php

namespace App\Controller;

class EventsController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $events = $this->Paginator->paginate($this->Events->find());
        $this->set(compact('events'));
    }

    public function view($id = null)
    {
        $event = $this->Events->findById($id)->firstOrFail();
        $this->set(compact('event'));
    }
}

?>