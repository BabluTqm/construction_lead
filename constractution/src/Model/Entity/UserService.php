<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


class UserService extends Entity
{
    
    protected $_accessible = [
        'user_id' => true,
        'service_id' => true,
        'created_date' => true,
        'user' => true,
        'service' => true,
    ];
}
