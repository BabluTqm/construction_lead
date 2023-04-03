<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\ORM\TableRegistry;

class UsersTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('OwnerServices', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Projects', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasOne('UserProfile', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasOne('ContractorCredit', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserServices', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('AssignedUsers', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('SetCredit', [
            'foreignKey' => 'user_id',
        ]);
    }
   
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        // $validator
        //     ->scalar('password')
        //     ->maxLength('password', 255)
        //     ->requirePresence('password', 'create')
        //     ->notEmptyString('password');

        $validator
            ->scalar('status')
            ->notEmptyString('status');

        $validator
            ->scalar('user_type')
            ->notEmptyString('user_type');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('modified_at')
            ->notEmptyDateTime('modified_at');

        return $validator;
    }

   
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }

      
    public function login($email, $password)
    {
        $result = $this->find('all')->where(['email' => $email, 'password' => $password])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmailExist($email)
    {
        $result = $this->find('all')->where(['email' => $email])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function resetPassword($token, $password)
    {
        $users = TableRegistry::get("Users");
        $query = $users->query();
        $result = $query->update()
            ->set(['password' => $password, 'token' => ''])
            ->where(['token' => $token])
            ->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checktokenexist($token)
    {
        $result = $this->find('all')->where(['token' => $token])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function insertToken($email, $token)
    {
        $users = TableRegistry::get("Users");
        $query = $users->query();
        $result = $query->update()
            ->set(['token' => $token])
            ->where(['email' => $email])
            ->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
