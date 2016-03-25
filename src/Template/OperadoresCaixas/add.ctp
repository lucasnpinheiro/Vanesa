<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('Add') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('Novo cadastro', ['action' => 'add'], ['icon' => 'fa fa-plus-circle', 'title' => 'Novo cadastro']); ?></li>
            <li><?php echo $this->Html->link('Consultas', ['action' => 'index'], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
        </ul>

    </div>
    <div class="panel-body">
        <?= $this->Form->create($pessoa) ?>
        <?php
        echo $this->Form->input('tipos', ['type' => 'hidden', 'value' => 5]);
        echo $this->Form->input('nome', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
        echo $this->Form->status('status', ['value' => 1, 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
        echo $this->Form->cep('cep', ['label' => 'CEP', 'div' => ['class' => 'col-xs-12 col-md-3'], 'onchange' => 'cake.util.getCep(this)']);

        echo $this->Form->input('endereco', ['label' => 'Endereço', 'div' => ['class' => 'col-xs-12 col-md-10']]);
        echo $this->Form->numero('numero', ['label' => 'Número', 'div' => ['class' => 'col-xs-12 col-md-2']]);
        echo $this->Form->input('bairro', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('cidade', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('estado', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->telefone('fone1', ['label' => 'Telefone 1', 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->telefone('fone2', ['label' => 'Telefone 2', 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->cnpj('cnpj', ['label' => 'CNPJ', 'div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->numero('incricao', ['maxlength' => 20, 'label' => 'Inscrição', 'div' => ['class' => 'col-xs-12 col-md-4']]);
        ?>
        <div class="clearfix"></div>
        <div class="text-right">
            <?= $this->Form->button(__('Submit')) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<?php $this->Html->script('/js/pessoas.js', ['block' => 'script']); ?>