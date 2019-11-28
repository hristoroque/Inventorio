<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OperationsCab Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $operation_type_id
 * @property string $operation_type
 * @property int $article_id
 * @property int $quantity
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user 
 * @property \App\Model\Entity\Article $article
 * @property \App\Model\Entity\OperationsType $operations_type
 * @property \App\Model\Entity\OperationsDet[] $operations_det
 */
class OperationsCab extends Entity
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
        'user_id' => true,
        'operation_type_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'operations_type' => true,
        'operation_type' => true,
        'article_id' => true,        
        'quantity' => true,
        'operations_det' => true,
        'article' => true
    ];
}
