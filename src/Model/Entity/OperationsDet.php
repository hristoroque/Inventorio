<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OperationsDet Entity
 *
 * @property int $id
 * @property int $operation_cab_id
 * @property int $article_id
 * @property int $quantity
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\OperationsCab $operations_cab
 * @property \App\Model\Entity\Article $article 
 */
class OperationsDet extends Entity
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
        'operation_cab_id' => true,
        'article_id' => true,
        'quantity' => true,
        'created' => true,
        'modified' => true,
        'operations_cab' => true,        
        'article' => true
    ];
}
