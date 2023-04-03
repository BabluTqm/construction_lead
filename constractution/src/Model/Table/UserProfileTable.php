<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserProfileTable extends Table
{
        
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('user_profile');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('UserProfile', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('AssignedUsers', [

            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name','Please Enter First Name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 100)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name','Please Enter Last Name');

        // $validator
        //     ->scalar('phone')
        //     ->maxLength('phone', 20)
        //     ->requirePresence('phone', 'create')
        //     ->notEmptyString('phone');

        // $validator
        //     ->scalar('address')
        //     ->maxLength('address', 250)
        //     ->requirePresence('address', 'create')
        //     ->notEmptyString('address');

        // $validator
        //     ->scalar('state')
        //     ->maxLength('state', 50)
        //     ->requirePresence('state', 'create')
        //     ->notEmptyString('state');

        // $validator
        //     ->scalar('city')
        //     ->maxLength('city', 50)
        //     ->requirePresence('city', 'create')
        //     ->notEmptyString('city');

        // $validator
        //     ->integer('pincode')
        //     ->requirePresence('pincode', 'create')
        //     ->notEmptyString('pincode');

        // $validator
        //     ->scalar('company_name')
        //     ->maxLength('company_name', 50)
        //     ->allowEmptyString('company_name');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
