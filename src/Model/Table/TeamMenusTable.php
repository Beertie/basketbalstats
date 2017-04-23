<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TeamMenus Model
 *
 * @property \Cake\ORM\Association\HasMany $Teams
 *
 * @method \App\Model\Entity\TeamMenu get($primaryKey, $options = [])
 * @method \App\Model\Entity\TeamMenu newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TeamMenu[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TeamMenu|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TeamMenu patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TeamMenu[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TeamMenu findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TeamMenusTable extends Table
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

        $this->table('team_menus');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Teams', [
            'foreignKey' => 'team_menu_id'
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
            ->dateTime('modifed')
            ->requirePresence('modifed', 'create')
            ->notEmpty('modifed');

        return $validator;
    }
}
