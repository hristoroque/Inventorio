<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * KardexesCab Model
 *
 * @property \App\Model\Table\ArticlesTable&\Cake\ORM\Association\BelongsTo $Articles
 * @property \App\Model\Table\KardexesDetTable&\Cake\ORM\Association\HasMany $KardexesDet
 *
 * @method \App\Model\Entity\KardexesCab get($primaryKey, $options = [])
 * @method \App\Model\Entity\KardexesCab newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\KardexesCab[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\KardexesCab|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\KardexesCab saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\KardexesCab patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\KardexesCab[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\KardexesCab findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class KardexesCabTable extends Table
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

        $this->setTable('kardexes_cab');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Articles', [
            'foreignKey' => 'article_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('KardexesDet', [
            'foreignKey' => 'kardex_cab_id'
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
            ->integer('current_stock')
            ->requirePresence('current_stock', 'create')
            ->notEmptyString('current_stock');

        $validator
            ->numeric('current_balance')
            ->requirePresence('current_balance', 'create')
            ->notEmptyString('current_balance');

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
        $rules->add($rules->existsIn(['article_id'], 'Articles'));

        return $rules;
    }
}
