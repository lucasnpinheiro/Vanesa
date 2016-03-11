<?php
namespace App\Model\Table;

use App\Model\Entity\Requisico;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requisicoes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Produtos
 */
class RequisicoesTable extends Table
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

        $this->table('requisicoes');
        $this->displayField('numero_documento');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->allowEmpty('numero_documento');

        $validator
            ->date('data')
            ->allowEmpty('data');

        $validator
            ->integer('tipo')
            ->allowEmpty('tipo');

        $validator
            ->numeric('quantidade')
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
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'));
        return $rules;
    }
}
