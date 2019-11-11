<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KardexesDetTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KardexesDetTable Test Case
 */
class KardexesDetTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KardexesDetTable
     */
    public $KardexesDet;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.KardexesDet',
        'app.KardexesCab'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('KardexesDet') ? [] : ['className' => KardexesDetTable::class];
        $this->KardexesDet = TableRegistry::getTableLocator()->get('KardexesDet', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->KardexesDet);

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
