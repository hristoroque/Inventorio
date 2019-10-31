<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticlesKardexesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArticlesKardexesTable Test Case
 */
class ArticlesKardexesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticlesKardexesTable
     */
    public $ArticlesKardexes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ArticlesKardexes',
        'app.Articles',
        'app.Kardexes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ArticlesKardexes') ? [] : ['className' => ArticlesKardexesTable::class];
        $this->ArticlesKardexes = TableRegistry::getTableLocator()->get('ArticlesKardexes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ArticlesKardexes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
