<?php

namespace App\Model\Table;

use App\Model\Entity\Pedido;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * Pedidos Model
 *
 * @property \Cake\ORM\Association\HasMany $PedidosItens
 */
class PedidosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('pedidos');
        $this->displayField('ficha');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PedidosItens', [
            'foreignKey' => 'pedido_id'
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
                ->integer('ficha')
                ->allowEmpty('ficha');

        $validator
                ->integer('status')
                ->allowEmpty('status');


        return $validator;
    }

    public function patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = array()) {
        if (!empty($data['valor_total'])) {
            $data['valor_total'] = (float) str_replace(',', '.', str_replace('.', '', $data['valor_total']));
        }
        if (!empty($data['valor_desconto'])) {
            $data['valor_desconto'] = (float) str_replace(',', '.', str_replace('.', '', $data['valor_desconto']));
        }
        if (!empty($data['valor_liquido'])) {
            $data['valor_liquido'] = (float) str_replace(',', '.', str_replace('.', '', $data['valor_liquido']));
        }
        if (!empty($data['valor_dinheiro'])) {
            $data['valor_dinheiro'] = (float) str_replace(',', '.', str_replace('.', '', $data['valor_dinheiro']));
        }
        if (!empty($data['valor_cheque'])) {
            $data['valor_cheque'] = (float) str_replace(',', '.', str_replace('.', '', $data['valor_cheque']));
        }
        if (!empty($data['valor_cartao'])) {
            $data['valor_cartao'] = (float) str_replace(',', '.', str_replace('.', '', $data['valor_cartao']));
        }
        if (!empty($data['valor_recebe'])) {
            $data['valor_recebe'] = (float) str_replace(',', '.', str_replace('.', '', $data['valor_recebe']));
        }
        if (!empty($data['valor_troco'])) {
            $data['valor_troco'] = (float) str_replace(',', '.', str_replace('.', '', $data['valor_troco']));
        }
        return parent::patchEntity($entity, $data, $options);
    }

}
