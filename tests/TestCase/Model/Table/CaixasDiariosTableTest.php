<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CaixasDiariosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CaixasDiariosTable Test Case
 */
class CaixasDiariosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CaixasDiariosTable
     */
    public $CaixasDiarios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.caixas_diarios',
        'app.pessoas',
        'app.caixas_movimentos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CaixasDiarios') ? [] : ['className' => 'App\Model\Table\CaixasDiariosTable'];
        $this->CaixasDiarios = TableRegistry::get('CaixasDiarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CaixasDiarios);

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
