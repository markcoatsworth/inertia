<?php
// src/Model/Table/SlugsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class SlugsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Events');
    }
}