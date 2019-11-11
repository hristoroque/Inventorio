<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * KardexesDet Model
 *
 * @property \App\Model\Table\KardexesCabTable&\Cake\ORM\Association\BelongsTo $KardexesCab
 *
 * @method \App\Model\Entity\KardexesDet get($primaryKey, $options = [])
 * @method \App\Model\Entity\KardexesDet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\KardexesDet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\KardexesDet|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\KardexesDet saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\KardexesDet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\KardexesDet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\KardexesDet findOrCreate($search, callable $callback = null, $options = [])
 */
class KardexesDetTable extends Table
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

        $this->setTable('kardexes_det');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('KardexesCab', [
            'foreignKey' => 'kardex_cab_id',
            'joinType' => 'INNER'
        ]);
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->dateTime('date')
            ->allowEmptyDateTime('date');

        $validator
            ->integer('entry_amount')
            ->requirePresence('entry_amount', 'create')
            ->notEmptyString('entry_amount');

        $validator
            ->numeric('entry_unit_price')
            ->requirePresence('entry_unit_price', 'create')
            ->notEmptyString('entry_unit_price');

        $validator
            ->numeric('entry_total_price')
            ->requirePresence('entry_total_price', 'create')
            ->notEmptyString('entry_total_price');

        $validator
            ->integer('output_amount')
            ->requirePresence('output_amount', 'create')
            ->notEmptyString('output_amount');

        $validator
            ->numeric('output_unit_price')
            ->requirePresence('output_unit_price', 'create')
            ->notEmptyString('output_unit_price');

        $validator
            ->numeric('output_total_price')
            ->requirePresence('output_total_price', 'create')
            ->notEmptyString('output_total_price');

        $validator
            ->integer('existence_current_stock')
            ->requirePresence('existence_current_stock', 'create')
            ->notEmptyString('existence_current_stock');

        $validator
            ->numeric('existence_current_balance')
            ->requirePresence('existence_current_balance', 'create')
            ->notEmptyString('existence_current_balance');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['kardex_cab_id'], 'KardexesCab'));

        return $rules;
    }
}
