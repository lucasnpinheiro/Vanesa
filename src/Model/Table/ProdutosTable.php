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
class ProdutosTable extends Table
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

        $this->table('produtos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('GrupoEstoques', [
            'foreignKey' => 'grupo_estoque_id'
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
    public function validationDefault(Validator $validator)
    {
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
            ->numeric('peso_baixa_estoque')
            ->allowEmpty('peso_baixa_estoque');

        $validator
            ->integer('desconto_pedido')
            ->allowEmpty('desconto_pedido');

        $validator
            ->integer('quantidade_pedido')
            ->allowEmpty('quantidade_pedido');

        $validator
            ->numeric('compra')
            ->allowEmpty('compra');

        $validator
            ->numeric('margem')
            ->allowEmpty('margem');

        $validator
            ->numeric('venda')
            ->allowEmpty('venda');

        $validator
            ->numeric('promocao')
            ->allowEmpty('promocao');

        $validator
            ->numeric('estoque_minimo')
            ->allowEmpty('estoque_minimo');

        $validator
            ->numeric('estoque_atual')
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
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['grupo_estoque_id'], 'GrupoEstoques'));
        return $rules;
    }
}
