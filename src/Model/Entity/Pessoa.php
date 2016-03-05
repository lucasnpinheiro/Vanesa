<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pessoa Entity.
 *
 * @property int $id
 * @property string $nome
 * @property int $status
 * @property string $endereco
 * @property string $numero
 * @property string $bairro
 * @property string $cidade
 * @property string $estado
 * @property string $cep
 * @property string $fone1
 * @property string $fone2
 * @property string $cnpj
 * @property string $incricao
 * @property string $username
 * @property string $senha
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Apagar[] $apagar
 * @property \App\Model\Entity\CaixasDiario[] $caixas_diarios
 * @property \App\Model\Entity\PessoasTipo[] $pessoas_tipos
 */
class Pessoa extends Entity
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
