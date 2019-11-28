<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KardexesCabTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KardexesCabTable Test Case
 */
class KardexesCabTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KardexesCabTable
     */
    public $KardexesCab;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.KardexesCab',
        'app.Articles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('KardexesCab') ? [] : ['className' => KardexesCabTable::class];
        $this->KardexesCab = TableRegistry::getTableLocator()->get('KardexesCab', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->KardexesCab);

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
