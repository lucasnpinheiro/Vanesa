<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Requisico Entity.
 *
 * @property int $id
 * @property string $numero_documento
 * @property \Cake\I18n\Time $data
 * @property int $produto_id
 * @property \App\Model\Entity\Produto $produto
 * @property int $tipo
 * @property float $quantidade
 * @property string $motivo
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Requisico extends Entity
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
