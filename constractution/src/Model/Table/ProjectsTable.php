<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProjectsTable extends Table
{
    // initialize function for all relations
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('projects');
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
            'foreignKey' => 'project_id',
        ]);
        $this->hasMany('OwnerServices', [
            'foreignKey' => 'project_id',
        ]);
    }
    public function validationDefault(Validator $validator): Validator
    {
      /*  $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('project_name')
            ->maxLength('project_name', 255)
            ->requirePresence('project_name', 'create')
            ->notEmptyString('project_name');

        $validator
            ->scalar('project_address')
            ->maxLength('project_address', 255)
            ->requirePresence('project_address', 'create')
            ->notEmptyString('project_address');

        $validator
            ->scalar('state')
            ->maxLength('state', 100)
            ->requirePresence('state', 'create')
            ->notEmptyString('state');

        $validator
            ->scalar('city')
            ->maxLength('city', 100)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        $validator
            ->integer('pincode')
            ->requirePresence('pincode', 'create')
            ->notEmptyString('pincode');

        $validator
            ->scalar('assigned_status')
            ->notEmptyString('assigned_status');

        $validator
            ->scalar('accept_status')
            ->notEmptyString('accept_status');

        $validator
            ->dateTime('created_date')
            ->notEmptyDateTime('created_date');*/

        return $validator;
    }

  
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
