<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class AssignedUsersTable extends Table
{
    // initialize function for all relations
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('assigned_users');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('UserProfile', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasOne('ContractorCredit', [
            'foreignKey' => 'user_id',
        ]);
    }

    // validator function for server side validation
    public function validationDefault(Validator $validator): Validator
    {
        // $validator
        //     ->integer('id')
        //     ->requirePresence('id', 'create')
        //     ->notEmptyString('id');

        // $validator
        //     ->integer('user_owner_id')
        //     ->requirePresence('user_owner_id', 'create')
        //     ->notEmptyString('user_owner_id');

        // $validator
        //     ->integer('project_id')
        //     ->notEmptyString('project_id');

        // $validator
        //     ->integer('assigned_userid')
        //     ->requirePresence('assigned_userid', 'create')
        //     ->notEmptyString('assigned_userid');

        // $validator
        //     ->dateTime('created_date')
        //     ->notEmptyDateTime('created_date');

        return $validator;
    }

   // fubnction for exists project id
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('project_id', 'Projects'), ['errorField' => 'project_id']);

        return $rules;
    }
}
