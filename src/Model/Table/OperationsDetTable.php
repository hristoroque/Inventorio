<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OperationsDet Model
 *
 * @property \App\Model\Table\OperationsCabTable&\Cake\ORM\Association\BelongsTo $OperationsCab
 * @property \App\Model\Table\ArticlesTable&\Cake\ORM\Association\BelongsTo $Articles
 *
 * @method \App\Model\Entity\OperationsDet get($primaryKey, $options = [])
 * @method \App\Model\Entity\OperationsDet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OperationsDet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OperationsDet|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OperationsDet saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OperationsDet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OperationsDet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OperationsDet findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OperationsDetTable extends Table
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

        $this->setTable('operations_det');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('OperationsCab', [
            'foreignKey' => 'operation_cab_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Articles', [
            'foreignKey' => 'article_id',
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
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

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
        $rules->add($rules->existsIn(['operation_cab_id'], 'OperationsCab'));
        $rules->add($rules->existsIn(['article_id'], 'Articles'));

        return $rules;
    }
}
