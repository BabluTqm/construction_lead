<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class OwnerServicesTable extends Table
{
     // initialize function for all relations
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('owner_services');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
            'joinType' => 'INNER',
        ]);
    }

   // validator function for server side validation
    public function validationDefault(Validator $validator): Validator
    {
        // $validator
        //     ->integer('project_id')
        //     ->notEmptyString('project_id');

        // $validator
        //     ->integer('user_id')
        //     ->notEmptyString('user_id');

        // $validator
        //     ->integer('service_id')
        //     ->notEmptyString('service_id');

        return $validator;
    }

   // fubnction for exists project id ,user_id services id
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('project_id', 'Projects'), ['errorField' => 'project_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('service_id', 'Services'), ['errorField' => 'service_id']);

        return $rules;
    }
}
