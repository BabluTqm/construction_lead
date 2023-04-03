<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;


class User extends Entity
{
   
    protected $_accessible = [
        'email' => true,
        'password' => true,
        'status' => true,
        'user_type' => true,
        'complete_status' => true,
        'created_at' => true,
        'modified_at' => true,
        'token'=>true,
        'owner_services' => true,
        'projects' => true,
        'user_profile' => true,
        'user_services' => true,
    ];

   
    protected $_hidden = [
        'password',
    ];
    // has password set
    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
