<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApagarTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApagarTable Test Case
 */
class ApagarTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApagarTable
     */
    public $Apagar;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.apagar',
        'app.pessoas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Apagar') ? [] : ['className' => 'App\Model\Table\ApagarTable'];
        $this->Apagar = TableRegistry::get('Apagar', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Apagar);

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
