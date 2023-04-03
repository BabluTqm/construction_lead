<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ServicesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('services');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('OwnerServices', [
            'foreignKey' => 'service_id',
        ]);
        $this->hasMany('UserServices', [
            'foreignKey' => 'service_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('service')
            ->maxLength('service', 250)
            ->requirePresence('service', 'create')
            ->notEmptyString('service');

        return $validator;
    }
}
