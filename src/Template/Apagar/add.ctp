<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('Add') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('Novo cadastro', ['action' => 'add'], ['icon' => 'fa fa-plus-circle', 'title' => 'Novo cadastro']); ?></li>
            <li><?php echo $this->Html->link('Consultas', ['action' => 'index'], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
        </ul>

    </div>
    <div class="panel-body">
        <?= $this->Form->create($apagar) ?>
        <?php
        echo $this->Form->input('numero_documento', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->statusContas('status', ['required' => true, 'value' => 1, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->pessoas('pessoa_id', ['required' => true, 'label' => 'Fornecedores', 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']], [3]);
        echo $this->Form->data('data_vencimento', ['required' => true, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->moeda('valor_documento', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->tiposPagamentos('tipo', ['required' => true, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->data('data_pagamento', ['type' => 'hidden', 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->moeda('valor_pagamento', ['type' => 'hidden', 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->moeda('valor_acrescimo', ['type' => 'hidden', 'disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);

        echo $this->Form->input('historico', ['type' => 'hidden', 'div' => ['class' => 'col-xs-12 col-md-12']]);
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