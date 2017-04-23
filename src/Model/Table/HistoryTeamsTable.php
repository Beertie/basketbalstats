<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HistoryTeams Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Nbbs
 * @property \Cake\ORM\Association\BelongsTo $Years
 *
 * @method \App\Model\Entity\HistoryTeam get($primaryKey, $options = [])
 * @method \App\Model\Entity\HistoryTeam newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HistoryTeam[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HistoryTeam|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HistoryTeam patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HistoryTeam[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HistoryTeam findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HistoryTeamsTable extends Table
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

        $this->table('history_teams');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Years', [
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
            ->allowEmpty('slug');

        $validator
            ->integer('comp_id_1')
            ->allowEmpty('comp_id_1');

        $validator
            ->integer('comp_id_2')
            ->allowEmpty('comp_id_2');

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
        $rules->add($rules->existsIn(['year_id'], 'Years'));

        return $rules;
    }
}
