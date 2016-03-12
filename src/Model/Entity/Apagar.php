<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Apagar Entity.
 *
 * @property int $id
 * @property string $numero_documento
 * @property int $status
 * @property int $pessoa_id
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property \Cake\I18n\Time $data_vencimento
 * @property float $valor_documento
 * @property int $tipo
 * @property string $historico
 * @property \Cake\I18n\Time $data_pagamento
 * @property float $valor_pagamento
 * @property float $valor_acrescimo
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Apagar extends Entity
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
