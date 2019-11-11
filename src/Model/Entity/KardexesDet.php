<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * KardexesDet Entity
 *
 * @property int $id
 * @property int $kardex_cab_id
 * @property \Cake\I18n\FrozenTime|null $date
 * @property int $entry_amount
 * @property float $entry_unit_price
 * @property float $entry_total_price
 * @property int $output_amount
 * @property float $output_unit_price
 * @property float $output_total_price
 * @property int $existence_current_stock
 * @property float $existence_current_balance
 *
 * @property \App\Model\Entity\KardexesCab $kardexes_cab
 */
class KardexesDet extends Entity
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
        'kardex_cab_id' => true,
        'date' => true,
        'entry_amount' => true,
        'entry_unit_price' => true,
        'entry_total_price' => true,
        'output_amount' => true,
        'output_unit_price' => true,
        'output_total_price' => true,
        'existence_current_stock' => true,
        'existence_current_balance' => true,
        'kardexes_cab' => true
    ];
}
