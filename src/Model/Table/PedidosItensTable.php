<?php
namespace App\Model\Table;

use App\Model\Entity\PedidosIten;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PedidosItens Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pedidos
 * @property \Cake\ORM\Association\BelongsTo $Produtos
 */
class PedidosItensTable extends Table
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

        $this->table('pedidos_itens');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pedidos', [
            'foreignKey' => 'pedido_id'
        ]);
        $this->belongsTo('Produtos', [
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
            ->numeric('valor_venda')
            ->allowEmpty('valor_venda');

        $validator
            ->numeric('quantidade')
            ->allowEmpty('quantidade');

        $validator
            ->numeric('valor_total')
            ->allowEmpty('valor_total');

        $validator
            ->numeric('perc_desconto')
            ->allowEmpty('perc_desconto');

        $validator
            ->numeric('valor_desconto')
            ->allowEmpty('valor_desconto');

        $validator
            ->numeric('valor_liquido')
            ->allowEmpty('valor_liquido');

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
        $rules->add($rules->existsIn(['pedido_id'], 'Pedidos'));
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'));
        return $rules;
    }
}
