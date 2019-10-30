<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArticlesKardexesFixture
 */
class ArticlesKardexesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'resgistry' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '1', 'comment' => '', 'precision' => null],
        'quantity' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'amount' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'article_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'kardex_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'kardex_key' => ['type' => 'index', 'columns' => ['kardex_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['article_id', 'kardex_id'], 'length' => []],
            'article_key' => ['type' => 'foreign', 'columns' => ['article_id'], 'references' => ['articles', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'kardex_key' => ['type' => 'foreign', 'columns' => ['kardex_id'], 'references' => ['kardexes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'resgistry' => 1,
                'quantity' => 1,
                'amount' => 1,
                'article_id' => 1,
                'kardex_id' => 1
            ],
        ];
        parent::init();
    }
}
