<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $id
 * @property int $provider_id
 * @property int $category_id
 * @property float $buy_price
 * @property float $sell_price
 * @property string $name
 * @property string|null $description
 * @property bool|null $state
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Provider $provider
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\KardexesCab[] $kardexes_cab
 * @property \App\Model\Entity\OperationsDet[] $operations_det
 */
class Article extends Entity
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
        'provider_id' => true,
        'category_id' => true,
        'buy_price' => true,
        'sell_price' => true,
        'name' => true,
        'description' => true,
        'state' => true,
        'created' => true,
        'modified' => true,
        'provider' => true,
        'category' => true,
        'kardexes_cab' => true,
        'operations_det' => true
    ];
}
