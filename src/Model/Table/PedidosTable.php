<?php
namespace App\Model\Table;

use App\Model\Entity\Pedido;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pedidos Model
 *
 * @property \Cake\ORM\Association\HasMany $PedidosItens
 */
class PedidosTable extends Table
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

        $this->table('pedidos');
        $this->displayField('ficha');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PedidosItens', [
            'foreignKey' => 'pedido_id'
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
            ->integer('ficha')
            ->allowEmpty('ficha');

        $validator
            ->date('data_pedido')
            ->allowEmpty('data_pedido');

        $validator
            ->integer('status')
            ->allowEmpty('status');

        $validator
            ->allowEmpty('nome_cliente');

        $validator
            ->numeric('valor_total')
            ->allowEmpty('valor_total');

        $validator
            ->numeric('valor_desconto')
            ->allowEmpty('valor_desconto');

        $validator
            ->numeric('valor_liquido')
            ->allowEmpty('valor_liquido');

        $validator
            ->numeric('valor_dinheiro')
            ->allowEmpty('valor_dinheiro');

        $validator
            ->numeric('valor_cheque')
            ->allowEmpty('valor_cheque');

        $validator
            ->numeric('valor_cartao')
            ->allowEmpty('valor_cartao');

        $validator
            ->numeric('valor_recebe')
            ->allowEmpty('valor_recebe');

        $validator
            ->numeric('valor_troco')
            ->allowEmpty('valor_troco');

        return $validator;
    }
}
