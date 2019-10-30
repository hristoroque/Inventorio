<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ArticlesKardex Entity
 *
 * @property int $id
 * @property int $article_id
 * @property int $kardex_id
 * @property bool|null $resgistry
 * @property int $quantity
 * @property int $amount
 *
 * @property \App\Model\Entity\Article $article
 * @property \App\Model\Entity\Kardex $kardex
 */
class ArticlesKardex extends Entity
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
        'article_id' => true,
        'kardex_id' => true,
        'resgistry' => true,
        'quantity' => true,
        'amount' => true,
        'article' => true,
        'kardex' => true
    ];
}
