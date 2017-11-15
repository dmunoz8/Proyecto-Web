<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Photos extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false
        //'slug' => false,
    ];
}
