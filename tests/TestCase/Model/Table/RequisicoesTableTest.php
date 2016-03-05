<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequisicoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequisicoesTable Test Case
 */
class RequisicoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequisicoesTable
     */
    public $Requisicoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.requisicoes',
        'app.produtos',
        'app.grupo_estoques',
        'app.pedidos_itens',
        'app.pedidos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Requisicoes') ? [] : ['className' => 'App\Model\Table\RequisicoesTable'];
        $this->Requisicoes = TableRegistry::get('Requisicoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Requisicoes);

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
