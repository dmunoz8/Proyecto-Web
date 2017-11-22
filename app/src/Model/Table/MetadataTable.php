<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Metadata Model
 *
 * @method \App\Model\Entity\Metadata get($primaryKey, $options = [])
 * @method \App\Model\Entity\Metadata newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Metadata[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Metadata|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Metadata patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Metadata[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Metadata findOrCreate($search, callable $callback = null, $options = [])
 */
class MetadataTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('metadata');
        $this->setDisplayField('preferences');
        $this->setPrimaryKey('preferences');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('preferences')
            ->allowEmpty('preferences', 'create');

        $validator
            ->scalar('camera')
            ->allowEmpty('camera');

        $validator
            ->scalar('lens')
            ->allowEmpty('lens');

        $validator
            ->scalar('shutterSpeed')
            ->allowEmpty('shutterSpeed');

        $validator
            ->scalar('aperture')
            ->allowEmpty('aperture');

        $validator
            ->scalar('ISO')
            ->allowEmpty('ISO');

        return $validator;
    }
}
