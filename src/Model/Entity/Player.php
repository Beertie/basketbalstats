<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Player Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $insertion
 * @property string $location
 * @property string $phone_1
 * @property string $phone_2
 * @property string $date_of_birth
 * @property int $membership
 * @property string $diploma
 * @property string $email
 * @property string $status
 * @property string $member_since
 * @property int $number
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\TeamsHasPlayer[] $teams_has_players
 */
class Player extends Entity
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
