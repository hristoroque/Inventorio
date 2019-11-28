<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OperationsCabTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OperationsCabTable Test Case
 */
class OperationsCabTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OperationsCabTable
     */
    public $OperationsCab;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OperationsCab',
        'app.Users',
        'app.OperationsTypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OperationsCab') ? [] : ['className' => OperationsCabTable::class];
        $this->OperationsCab = TableRegistry::getTableLocator()->get('OperationsCab', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OperationsCab);

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
