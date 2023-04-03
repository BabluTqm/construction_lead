<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class UserProfile extends Entity
{
   
    protected $_accessible = [
        'user_id' => true,
        'first_name' => true,
        'last_name' => true,
        'phone' => true,
        'address1' => true,
        'address2' => true,
        'state' => true,
        'city' => true,
        'pincode' => true,
        'company_name' => true,
        'user' => true,
        'projects' => true,
    ];
}
