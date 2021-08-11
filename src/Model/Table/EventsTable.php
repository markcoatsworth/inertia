<?php
// src/Model/Table/EventsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class EventsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
    }
}