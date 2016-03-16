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
class CaixasMovimentosTable extends Table
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

        $this->table('caixas_movimentos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CaixasDiarios', [
            'foreignKey' => 'caixas_diario_id'
        ]);
        $this->belongsTo('Grupos', [
            'foreignKey' => 'grupo_id'
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
            ->integer('status')
            ->allowEmpty('status');

        $validator
            ->decimal('valor')
            ->allowEmpty('valor');

        $validator
            ->allowEmpty('descricao');

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
        $rules->add($rules->existsIn(['caixas_diario_id'], 'CaixasDiarios'));
        $rules->add($rules->existsIn(['grupo_id'], 'Grupos'));
        return $rules;
    }
}
