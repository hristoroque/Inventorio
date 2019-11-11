<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OperationsDetTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OperationsDetTable Test Case
 */
class OperationsDetTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OperationsDetTable
     */
    public $OperationsDet;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OperationsDet',
        'app.OperationsCab',
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
        $config = TableRegistry::getTableLocator()->exists('OperationsDet') ? [] : ['className' => OperationsDetTable::class];
        $this->OperationsDet = TableRegistry::getTableLocator()->get('OperationsDet', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OperationsDet);

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
