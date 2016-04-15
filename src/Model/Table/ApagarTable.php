<?php

namespace App\Model\Table;

use App\Model\Entity\Apagar;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * Apagar Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 */
class ApagarTable extends Table {

    use \App\Model\ExtraTrait;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('apagar');
        $this->displayField('numero_documento');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pessoas', [
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

        $search->add('data_inicio', 'Search.Callback', [
            'callback' => function ($query, $args, $manager) {
                return $query->where([$this->aliasField('data_vencimento') . ' >=' => implode('-', array_reverse(explode('/', $args['data_inicio'])))]);
            }
                ]);
        $search->add('data_fim', 'Search.Callback', [
            'callback' => function ($query, $args, $manager) {
                return $query->where([$this->aliasField('data_vencimento') . ' <=' => implode('-', array_reverse(explode('/', $args['data_fim'])))]);
            }
                ]);

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
                        ->integer('status')
                        ->allowEmpty('status');

                $validator
                        ->date('data_vencimento', ['dmy'])
                        ->allowEmpty('data_vencimento');

                $validator
                        ->decimal('valor_documento')
                        ->allowEmpty('valor_documento');

                $validator
                        ->integer('tipo')
                        ->allowEmpty('tipo');

                $validator
                        ->allowEmpty('historico');

                $validator
                        ->date('data_pagamento', ['dmy'])
                        ->allowEmpty('data_pagamento');

                $validator
                        ->decimal('valor_pagamento')
                        ->allowEmpty('valor_pagamento');

                $validator
                        ->decimal('valor_acrescimo')
                        ->allowEmpty('valor_acrescimo');

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
                $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
                return $rules;
            }

            public function beforeSave(\Cake\Event\Event $event, \Cake\ORM\Entity $entity) {
                if ($entity->tipo === 1) {
                    if (empty($entity->data_pagamento)) {
                        $entity->data_pagamento = $entity->data_vencimento;
                    }
                    if (empty($entity->valor_pagamento)) {
                        $entity->valor_pagamento = $entity->valor_documento;
                    }
                }

                if (!empty($entity->data_pagamento)) {
                    $entity->valor_acrescimo = ($this->convertMoney($entity->valor_pagamento) - $this->convertMoney($entity->valor_documento));
                    $entity->status = 2;
                }
            }

            public function afterSave(\Cake\Event\Event $event, \Cake\Datasource\EntityInterface $entity, \ArrayObject $options) {
                if (empty($entity->numero_documento)) {
                    $this->updateAll(['numero_documento' => $entity->id], ['id' => $entity->id]);
                }
            }

        }
        