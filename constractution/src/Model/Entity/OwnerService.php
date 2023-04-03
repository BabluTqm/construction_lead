<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


class OwnerService extends Entity
{
   
    protected $_accessible = [
        '*' => true,
       /* 'user_id' => true,
        'service_id' => true,
        'project' => true,
        'user' => true,
        'service' => true,*/
    ];
}
