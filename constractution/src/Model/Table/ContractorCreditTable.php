<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ContractorCreditTable extends Table
{
   
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('contractor_credit');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('AssignedUsers', [
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
            ->integer('total_credit')
            ->requirePresence('total_credit', 'create')
            ->notEmptyString('total_credit');

        $validator
            ->dateTime('credited_date')
            ->notEmptyDateTime('credited_date');

        return $validator;
    }

}
