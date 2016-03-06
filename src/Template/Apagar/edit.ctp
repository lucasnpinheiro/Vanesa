<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('Edit') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('', ['action' => 'add'], ['icon' => 'fa fa-plus-circle', 'title' => 'Novo cadastro']); ?></li>
            <li><?php echo $this->Html->link('', ['action' => 'index'], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
        </ul>

    </div>
    <div class="panel-body">
        <?= $this->Form->create($apagar) ?>
        <?php
        echo $this->Form->input('numero_documento', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('status', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('data_vencimento', ['empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('valor_codumento', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('tipo', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('historico', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('data_pagamento', ['empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('valor_pagamento', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('valor_acrescimo', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        ?>
        <div class="clearfix"></div>
        <div class="text-right">
            <?= $this->Form->button(__('Submit')) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

