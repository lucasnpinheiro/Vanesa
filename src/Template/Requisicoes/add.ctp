<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('Add') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('Novo cadastro', ['action' => 'add'], ['icon' => 'fa fa-plus-circle', 'title' => 'Novo cadastro']); ?></li>
            <li><?php echo $this->Html->link('Consultas', ['action' => 'index'], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
        </ul>

    </div>
    <div class="panel-body">
        <?= $this->Form->create($requisico) ?>
        <?php
        echo $this->Form->input('numero_documento', ['label' => 'Número do Documento', 'div' => ['class' => 'col-xs-12 col-md-3']]);
        echo $this->Form->data('data', ['required' => true, 'value' => date('d/m/Y'), 'div' => ['class' => 'col-xs-12 col-md-3']]);
        echo $this->Form->tipo('tipo', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
        echo $this->Form->quantidade('quantidade', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
        echo $this->Form->input('produto_id', ['required' => true, 'options' => $produtos, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-12']]);
        echo $this->Form->input('motivo', ['div' => ['class' => 'col-xs-12 col-md-12']]);
        ?>
        <div class="clearfix"></div>
        <h3>Dados do Produto</h3>
        <div class="col-xs-12 col-md-6">Produto: <span class="produto-nome"></span></div>
        <div class="col-xs-12 col-md-3">Estoque Atual: <span class="produto-estoque"></span></div>
        <div class="col-xs-12 col-md-3">Valor de Venda: <span class="produto-valor-venda"></span></div>
        <div class="clearfix"></div>
        <div class="text-right">
            <?= $this->Form->button(__('Submit')) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<?php
$this->Html->script('/js/select2.min.js', ['block' => 'script']);
$this->Html->css('/css/select2.min.css', ['block' => 'css']);
$this->Html->script('/js/requisicoes.js', ['block' => 'script']);
?>