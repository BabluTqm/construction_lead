<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


class Service extends Entity
{
    
    protected $_accessible = [
        
        'service_status' => true,
        'service' => true,
        'created' => true,
        'owner_services' => true,
        'user_services' => true,
    ];
}
