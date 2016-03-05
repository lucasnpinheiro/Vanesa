<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity.
 *
 * @property int $id
 * @property int $ficha
 * @property \Cake\I18n\Time $data_pedido
 * @property int $status
 * @property string $nome_cliente
 * @property float $valor_total
 * @property float $valor_desconto
 * @property float $valor_liquido
 * @property float $valor_dinheiro
 * @property float $valor_cheque
 * @property float $valor_cartao
 * @property float $valor_recebe
 * @property float $valor_troco
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\PedidosIten[] $pedidos_itens
 */
class Pedido extends Entity
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
