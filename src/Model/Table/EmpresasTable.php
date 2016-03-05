<?php
namespace App\Model\Table;

use App\Model\Entity\Empresa;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Empresas Model
 *
 */
class EmpresasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('empresas');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('nome');

        $validator
            ->allowEmpty('endereco');

        $validator
            ->allowEmpty('numero');

        $validator
            ->allowEmpty('bairro');

        $validator
            ->allowEmpty('cidade');

        $validator
            ->allowEmpty('estado');

        $validator
            ->allowEmpty('cep');

        $validator
            ->allowEmpty('cnpj');

        $validator
            ->allowEmpty('inscricao');

        $validator
            ->allowEmpty('fone1');

        $validator
            ->allowEmpty('fone2');

        return $validator;
    }
}
