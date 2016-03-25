<?php

namespace App\Model\Table;

use App\Model\Entity\Requisico;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * Requisicoes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Produtos
 */
class RequisicoesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('requisicoes');
        $this->displayField('numero_documento');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Produtos', [
            'foreignKey' => 'produto_id'
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
                ->allowEmpty('numero_documento');

        $validator
                ->date('data', ['dmy'])
                ->allowEmpty('data');

        $validator
                ->integer('tipo')
                ->allowEmpty('tipo');

        $validator
                ->decimal('quantidade')
                ->allowEmpty('quantidade');

        $validator
                ->allowEmpty('motivo');

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
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'));
        return $rules;
    }

    public function afterSave(\Cake\Event\Event $event, \Cake\Datasource\EntityInterface $entity, \ArrayObject $options) {
        if (empty($entity->numero_documento)) {
            $this->updateAll(['numero_documento' => $entity->id], ['id' => $entity->id]);
        }
        $GruposEstoques = \Cake\ORM\TableRegistry::get('GruposEstoques');
        $Produtos = \Cake\ORM\TableRegistry::get('Produtos');
        $produto = $Produtos->get((int) $entity->produto_id);
        $gruposEstoque = $GruposEstoques->get($produto->grupos_estoque_id);
        if ($gruposEstoque->estoque_global > 0) {
            $produto = $Produtos->get($gruposEstoque->estoque_global);
        }
        if ($entity->tipo == 1) {
            if ($produto->peso_baixa_estoque > 0) {
                $produto->estoque_atual += ((double) $produto->peso_baixa_estoque * (double) $entity->quantidade);
            } else {
                $produto->estoque_atual += (double) $entity->quantidade;
            }
        } else if ($entity->tipo == 2) {
            if ($produto->peso_baixa_estoque > 0) {
                $produto->estoque_atual -= ((double) $produto->peso_baixa_estoque * (double) $entity->quantidade);
            } else {
                $produto->estoque_atual -= (double) $entity->quantidade;
            }
        }
        $Produtos->save($produto);
    }

}
