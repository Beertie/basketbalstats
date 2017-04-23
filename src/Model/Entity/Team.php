<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Team Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $nbb_id
 * @property int $comp_id_1
 * @property int $comp_id_2
 * @property int $team_menu_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Team extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
