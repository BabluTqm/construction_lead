<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


class AssignedUser extends Entity
{
   
    protected $_accessible = [
        'id' => true,
        'user_id' => true,
        'project_id' => true,
        'owner_user_id ' => true,
        'created_date' => true,
        'project' => true,
        'user' => true,
    ];
}
