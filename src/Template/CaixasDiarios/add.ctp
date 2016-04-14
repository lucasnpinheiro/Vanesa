<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('Add') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('Novo cadastro', ['action' => 'add'], ['icon' => 'fa fa-plus-circle', 'title' => 'Novo cadastro']); ?></li>
            <li><?php echo $this->Html->link('Consultas', ['action' => 'index'], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
        </ul>

    </div>
    <div class="panel-body">
        <?= $this->Form->create($caixasDiario) ?>
        <?php
        echo $this->Form->data('data', ['div' => ['class' => 'col-xs-12 col-md-4'], 'value' => date('d/m/Y')]);
        echo $this->Form->input('terminal', ['options' => $terminais, 'empty' => true, 'value' => 1, 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->pessoas('pessoa_id', ['empty' => true, 'label' => 'Operadores', 'div' => ['class' => 'col-xs-12 col-md-4']], [5]);
        ?>
        <div class="clearfix"></div>
        <div class="text-right">
            <?= $this->Form->button(__('Submit')) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

