<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PessoasTiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PessoasTiposTable Test Case
 */
class PessoasTiposTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PessoasTiposTable
     */
    public $PessoasTipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pessoas_tipos',
        'app.pessoas',
        'app.apagar',
        'app.caixas_diarios',
        'app.caixas_movimentos',
        'app.grupos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PessoasTipos') ? [] : ['className' => 'App\Model\Table\PessoasTiposTable'];
        $this->PessoasTipos = TableRegistry::get('PessoasTipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PessoasTipos);

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
