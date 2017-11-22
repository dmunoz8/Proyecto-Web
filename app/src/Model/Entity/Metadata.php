<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Metadata Entity
 *
 * @property int $preferences
 * @property string $camera
 * @property string $lens
 * @property string $shutterSpeed
 * @property string $aperture
 * @property string $ISO
 */
class Metadata extends Entity
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
        'camera' => true,
        'lens' => true,
        'shutterSpeed' => true,
        'aperture' => true,
        'ISO' => true
    ];
}
