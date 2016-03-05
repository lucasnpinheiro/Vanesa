<?php
namespace App\Model\Table;

use App\Model\Entity\Pessoa;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pessoas Model
 *
 * @property \Cake\ORM\Association\HasMany $Apagar
 * @property \Cake\ORM\Association\HasMany $CaixasDiarios
 * @property \Cake\ORM\Association\HasMany $PessoasTipos
 */
class PessoasTable extends Table
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

        $this->table('pessoas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Apagar', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('CaixasDiarios', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('PessoasTipos', [
            'foreignKey' => 'pessoa_id'
        ]);
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
            ->integer('status')
            ->allowEmpty('status');

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
            ->allowEmpty('fone1');

        $validator
            ->allowEmpty('fone2');

        $validator
            ->allowEmpty('cnpj');

        $validator
            ->allowEmpty('incricao');

        $validator
            ->allowEmpty('username');

        $validator
            ->allowEmpty('senha');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        return $rules;
    }
}
