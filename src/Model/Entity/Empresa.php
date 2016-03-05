<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empresa Entity.
 *
 * @property int $id
 * @property string $nome
 * @property string $endereco
 * @property string $numero
 * @property string $bairro
 * @property string $cidade
 * @property string $estado
 * @property string $cep
 * @property string $cnpj
 * @property string $inscricao
 * @property string $fone1
 * @property string $fone2
 */
class Empresa extends Entity
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
