<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Years Model
 *
 * @property \Cake\ORM\Association\HasMany $HistoryTeams
 *
 * @method \App\Model\Entity\Year get($primaryKey, $options = [])
 * @method \App\Model\Entity\Year newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Year[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Year|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Year patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Year[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Year findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class YearsTable extends Table
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

        $this->table('years');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('HistoryTeams', [
            'foreignKey' => 'year_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('start')
            ->requirePresence('start', 'create')
            ->notEmpty('start');

        $validator
            ->integer('end')
            ->requirePresence('end', 'create')
            ->notEmpty('end');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmpty('sort_order');

        return $validator;
    }
}
