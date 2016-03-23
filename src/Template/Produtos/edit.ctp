<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('Edit') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('Novo cadastro', ['action' => 'add'], ['icon' => 'fa fa-plus-circle', 'title' => 'Novo cadastro']); ?></li>
            <li><?php echo $this->Html->link('Consultas', ['action' => 'index'], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
        </ul>

    </div>
    <div class="panel-body">
        <?= $this->Form->create($produto) ?>
        <?php
        echo $this->Form->input('nome', ['required' => true, 'div' => ['class' => 'col-sx-12 col-md-6']]);
        echo $this->Form->input('barra', ['label' => 'Código de barra', 'div' => ['class' => 'col-sx-12 col-md-2']]);
        echo $this->Form->input('unidade', ['required' => true, 'div' => ['class' => 'col-sx-12 col-md-2']]);
        echo $this->Form->status('status', ['required' => true, 'div' => ['class' => 'col-sx-12 col-md-2']]);
        echo $this->Form->input('grupos_estoque_id', ['options' => $gruposEstoques, 'required' => true, 'div' => ['class' => 'col-sx-12 col-md-3']]);
        echo $this->Form->quantidade('peso_baixa_estoque', [ 'div' => ['class' => 'col-sx-12 col-md-3']]);
        echo $this->Form->simNao('desconto_pedido', ['div' => [ 'class' => 'col-sx-12 col-md-3']]);
        echo $this->Form->simNao('quantidade_pedido', ['div' => ['class' => 'col-sx-12 col-md-3']]);
        echo $this->Form->moeda('compra', ['class' => 'calcular-procentagem',  'div' => ['class' => 'col-sx-12 col-md-3']]);
        echo $this->Form->moeda('venda', ['class' => 'calcular-procentagem',  'div' => ['class' => 'col-sx-12 col-md-3']]);
        echo $this->Form->juros('margem', ['disabled' => true, 'div' => ['class' => 'col-sx-12 col-md-3']]);
        echo $this->Form->moeda('promocao', ['label' => 'Promoção', 'div' => ['class' => 'col-sx-12 col-md-3']]);
        echo $this->Form->quantidade('estoque_minimo', ['div' => ['class' => 'col-sx-12 col-md-3']]);
        echo $this->Form->quantidade('estoque_atual', ['div' => ['class' => 'col-sx-12 col-md-3']]);
        echo $this->Form->simNao('atalho', ['required' => true, 'div' => ['class' => 'col-sx-12 col-md-3']]);
        echo $this->Form->input('nome_atalho', ['div' => ['class' => 'col-sx-12 col-md-3']]);
        ?>
        <div class="clearfix"></div>
        <div class="text-right">
            <?= $this->Form->button(__('Submit')) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<?php $this->Html->script('/js/produtos.js', ['block' => 'script']); ?>