<?php

namespace App\Model\Table;

use App\Model\Entity\CaixasMovimento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CaixasMovimentos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CaixasDiarios
 * @property \Cake\ORM\Association\BelongsTo $Grupos
 */
class CaixasMovimentosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('caixas_movimentos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CaixasDiarios', [
            'foreignKey' => 'caixas_diario_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
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
        $rules->add($rules->existsIn(['caixas_diario_id'], 'CaixasDiarios'));
        return $rules;
    }

    public function beforeSave(\Cake\Event\Event $event, \Cake\ORM\Entity $entity) {
        $entity->valor = str_replace('.', '', $entity->valor);
        $entity->valor = (float) str_replace(',', '.', $entity->valor);
    }

}
