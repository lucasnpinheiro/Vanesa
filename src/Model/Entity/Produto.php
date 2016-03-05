<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produto Entity.
 *
 * @property int $id
 * @property string $nome
 * @property string $unidade
 * @property int $status
 * @property int $grupo_estoque_id
 * @property \App\Model\Entity\GrupoEstoque $grupo_estoque
 * @property float $peso_baixa_estoque
 * @property int $desconto_pedido
 * @property int $quantidade_pedido
 * @property float $compra
 * @property float $margem
 * @property float $venda
 * @property float $promocao
 * @property float $estoque_minimo
 * @property float $estoque_atual
 * @property int $atalho
 * @property string $nome_atalho
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\PedidosIten[] $pedidos_itens
 * @property \App\Model\Entity\Requisico[] $requisicoes
 */
class Produto extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
