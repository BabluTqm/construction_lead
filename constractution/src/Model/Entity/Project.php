<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


// project Entity class

class Project extends Entity
{
   

    protected $_accessible = [
        '*' => true,
       /* 'project_name' => true,
        'project_address1' => true,
        'project_address2' => true,
        'state' => true,
        'city' => true,
        'pincode' => true,
        'assigned_status' => true,
        'accept_status' => true,
        'created_date' => true,
        'user' => true,
        'assigned_users' => true,
        'owner_services' => true,*/
    ];
}
