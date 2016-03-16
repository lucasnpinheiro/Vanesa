<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('Add') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('Novo cadastro', ['action' => 'add'], ['icon' => 'fa fa-plus-circle', 'title' => 'Novo cadastro']); ?></li>
            <li><?php echo $this->Html->link('Consultas', ['action' => 'index'], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
        </ul>

    </div>
    <div class="panel-body">
        <?= $this->Form->create($caixasMovimento) ?>
        <?php
        echo $this->Form->input('caixas_diario_id', ['options' => $caixasDiarios, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
        echo $this->Form->status('status', ['div' => ['class' => 'col-xs-12 col-md-3']]);
        echo $this->Form->moeda('valor', ['div' => ['class' => 'col-xs-12 col-md-3']]);
        echo $this->Form->input('grupo_id', ['options' => $grupos, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
        echo $this->Form->input('descricao', ['label' => 'Descrição', 'type' => 'textarea', 'div' => ['class' => 'col-xs-12 col-md-12']]);
        ?>
        <div class="clearfix"></div>
        <div class="text-right">
            <?= $this->Form->button(__('Submit')) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

