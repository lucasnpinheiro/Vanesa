<?php

namespace App\Model\Table;

use App\Model\Entity\Pessoa;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * Pessoas Model
 *
 * @property \Cake\ORM\Association\HasMany $Apagar
 * @property \Cake\ORM\Association\HasMany $CaixasDiarios
 * @property \Cake\ORM\Association\HasMany $PessoasTipos
 */
class PessoasTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
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
        $this->addBehavior('Search.Search');
    }

    public function searchConfiguration() {
        return $this->searchConfigurationDynamic();
    }

    private function searchConfigurationDynamic() {
        $search = new Manager($this);
        $c = $this->schema()->columns();
        foreach ($c as $key => $value) {
            $t = $this->schema()->columnType($value);
            if ($t != 'string' AND $t != 'text') {
                $search->value($value, ['field' => $this->aliasField($value)]);
            } else {
                $search->like($value, ['before' => true, 'after' => true, 'field' => $this->aliasField($value)]);
            }
        }

        return $search;
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
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
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['username']));
        return $rules;
    }

    public function beforeSave(\Cake\Event\Event $event, \Cake\ORM\Entity $entity) {
        if (!empty($entity->senha)) {
            $senha = (new \Cake\Auth\DefaultPasswordHasher())->hash($entity->senha);
            $entity->senha = $senha;
        } else {
            unset($entity->senha);
        }
        return true;
    }

    public function afterSave(\Cake\Event\Event $event, \Cake\Datasource\EntityInterface $entity, \ArrayObject $options) {
        $t = \Cake\ORM\TableRegistry::get('PessoasTipos');
        $f = $t->findByPessoaIdAndTipo($entity->id, $entity->tipos)->first();
        if (empty($f)) {
            $d = $t->newEntity();
            $d->pessoa_id = $entity->id;
            $d->tipo = $entity->tipos;
            $t->save($d);
        }
    }

}
