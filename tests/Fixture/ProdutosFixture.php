<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProdutosFixture
 *
 */
class ProdutosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'nome' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'unidade' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'status' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '1 - Ativo | 2 - Inativo | 9 - Excluido', 'precision' => null, 'autoIncrement' => null],
        'grupo_estoque_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'peso_baixa_estoque' => ['type' => 'float', 'length' => 4, 'precision' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'desconto_pedido' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '0 - Nao | 1 - Sim', 'precision' => null, 'autoIncrement' => null],
        'quantidade_pedido' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '0 - Nao | 1 - Sim', 'precision' => null, 'autoIncrement' => null],
        'compra' => ['type' => 'float', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'margem' => ['type' => 'float', 'length' => 4, 'precision' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'venda' => ['type' => 'float', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'promocao' => ['type' => 'float', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'estoque_minimo' => ['type' => 'float', 'length' => 6, 'precision' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'estoque_atual' => ['type' => 'float', 'length' => 6, 'precision' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'atalho' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '0 - Nao | 1 - Sim', 'precision' => null, 'autoIncrement' => null],
        'nome_atalho' => ['type' => 'string', 'length' => 15, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'nome' => 'Lorem ipsum dolor sit amet',
            'unidade' => '',
            'status' => 1,
            'grupo_estoque_id' => 1,
            'peso_baixa_estoque' => 1,
            'desconto_pedido' => 1,
            'quantidade_pedido' => 1,
            'compra' => 1,
            'margem' => 1,
            'venda' => 1,
            'promocao' => 1,
            'estoque_minimo' => 1,
            'estoque_atual' => 1,
            'atalho' => 1,
            'nome_atalho' => 'Lorem ipsum d',
            'created' => '2016-03-05 00:33:39',
            'modified' => '2016-03-05 00:33:39'
        ],
    ];
}
