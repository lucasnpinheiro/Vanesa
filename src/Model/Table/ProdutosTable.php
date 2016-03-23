<?php

namespace App\Model\Table;

use App\Model\Entity\Produto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produtos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $GrupoEstoques
 * @property \Cake\ORM\Association\HasMany $PedidosItens
 * @property \Cake\ORM\Association\HasMany $Requisicoes
 */
class ProdutosTable extends Table {

    use \App\Model\ExtraTrait;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('produtos');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('GruposEstoques', [
            'foreignKey' => 'grupos_estoque_id'
        ]);
        $this->hasMany('PedidosItens', [
            'foreignKey' => 'produto_id'
        ]);
        $this->hasMany('Requisicoes', [
            'foreignKey' => 'produto_id'
        ]);
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
                ->allowEmpty('unidade');

        $validator
                ->integer('status')
                ->allowEmpty('status');

        $validator
                ->decimal('peso_baixa_estoque')
                ->allowEmpty('peso_baixa_estoque');

        $validator
                ->decimal('desconto_pedido')
                ->allowEmpty('desconto_pedido');

        $validator
                ->decimal('quantidade_pedido')
                ->allowEmpty('quantidade_pedido');

        $validator
                ->decimal('compra')
                ->allowEmpty('compra');

        $validator
                ->decimal('margem')
                ->allowEmpty('margem');

        $validator
                ->decimal('venda')
                ->allowEmpty('venda');

        $validator
                ->decimal('promocao')
                ->allowEmpty('promocao');

        $validator
                ->decimal('estoque_minimo')
                ->allowEmpty('estoque_minimo');

        $validator
                ->decimal('estoque_atual')
                ->allowEmpty('estoque_atual');

        $validator
                ->integer('atalho')
                ->allowEmpty('atalho');

        $validator
                ->allowEmpty('nome_atalho');

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
        $rules->add($rules->existsIn(['grupos_estoque_id'], 'GruposEstoques'));
        return $rules;
    }

    public function beforeSave(\Cake\Event\Event $event, \Cake\ORM\Entity $entity) {
        $entity->compra = $this->convertMoney($entity->compra);
        $entity->venda = $this->convertMoney($entity->venda);
        $entity->promocao = $this->convertMoney($entity->promocao);
        $entity->peso_baixa_estoque = $this->convertMoney($entity->peso_baixa_estoque);
        $entity->estoque_minimo = $this->convertMoney($entity->estoque_minimo);
        $entity->estoque_atual = $this->convertMoney($entity->estoque_atual);
        $entity->margem = $this->convertMoney($entity->margem);

        if (!empty($entity->compra) AND ! empty($entity->venda)) {
            $entity->margem = floatval((($entity->venda - $entity->compra) / $entity->venda) * 100);
        }
        return true;
    }

    public function afterSave(\Cake\Event\Event $event, \Cake\Datasource\EntityInterface $entity, \ArrayObject $options) {
        if (empty($entity->barra)) {
            $this->updateAll(['barra' => $entity->id], ['id' => $entity->id]);
        }
    }

}
