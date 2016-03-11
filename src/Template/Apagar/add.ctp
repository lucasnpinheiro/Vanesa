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
        echo $this->Form->status('status', ['value' => 1, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->data('data_vencimento', ['empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->moeda('valor_codumento', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('tipo', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->data('data_pagamento', ['empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->moeda('valor_pagamento', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->moeda('valor_acrescimo', ['div' => ['class' => 'col-xs-12 col-md-4']]);

        echo $this->Form->input('historico', ['div' => ['class' => 'col-xs-12 col-md-12'], 'type' => 'textarea']);
        ?>
        <div class="clearfix"></div>
        <div class="text-right">
            <?= $this->Form->button(__('Submit')) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

