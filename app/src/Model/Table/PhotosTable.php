<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

class PhotosTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('photos');
        $this->setPrimaryKey('id');
        $this->belongsTo('Metadata')
        ->setJoinType('INNER');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('location')
            ->requirePresence('location', 'create')
            ->notEmpty('location');

          $validator
              ->scalar('tags')
              ->requirePresence('tags', 'create')
              ->notEmpty('tags');

          $validator
              ->scalar('metadata_id')
              ->requirePresence('metadata_id', 'create')
              ->notEmpty('metadata_id');

        return $validator;
    }
}
