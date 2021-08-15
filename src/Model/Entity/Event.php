<?php
// src/Model/Entity/Event.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Event extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'title' => false,
        'details' => false,
        'date' => false
    ];
}

?>