<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('Edit') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('Novo cadastro', ['action' => 'add'], ['icon' => 'fa fa-plus-circle', 'title' => 'Novo cadastro']); ?></li>
            <li><?php echo $this->Html->link('Consultas', ['action' => 'index'], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
        </ul>

    </div>
    <div class="panel-body">
        <?= $this->Form->create($apagar) ?>
        <?php
        if (!empty($apagar->data_vencimento)) {
            $apagar->data_vencimento->format('dmy');
        }
        if (!empty($apagar->data_pagamento)) {
            $apagar->data_pagamento->format('dmy');
        }
        $required = true;
        $disabled = false;
        $disabledStatus = false;
        if ($apagar->tipo === 1) {
            $required = false;
            $disabled = true;
             $disabledStatus = true;
        }
        
        if($apagar->status === 2){
            $disabledStatus = true;
        }
        echo $this->Form->input('numero_documento', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->statusContas('status', ['disabled' => $disabledStatus, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->pessoas('pessoa_id', ['disabled' => true, 'label' => 'Fornecedores', 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']], [3]);
        echo $this->Form->data('data_vencimento', ['disabled' => true, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->moeda('valor_documento', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->tiposPagamentos('tipo', ['disabled' => true, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->data('data_pagamento', ['required' => $required, 'disabled' => $disabled, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->moeda('valor_pagamento', ['required' => $required, 'disabled' => $disabled, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->moeda('valor_acrescimo', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);

        echo $this->Form->input('historico', ['div' => ['class' => 'col-xs-12 col-md-12'], 'type' => 'textarea']);
        ?>
        <div class="clearfix"></div>
        <div class="text-right">
            <?= $this->Form->button(__('Submit')) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<?php
$this->Html->script('/js/apagar.js', ['block' => 'script']);
?>