<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos Itens'), ['controller' => 'PedidosItens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedidos Iten'), ['controller' => 'PedidosItens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requisicoes'), ['controller' => 'Requisicoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requisico'), ['controller' => 'Requisicoes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtos form large-9 medium-8 columns content">
    <?= $this->Form->create($produto) ?>
    <fieldset>
        <legend><?= __('Add Produto') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('unidade');
            echo $this->Form->input('status');
            echo $this->Form->input('grupo_estoque_id');
            echo $this->Form->input('peso_baixa_estoque');
            echo $this->Form->input('desconto_pedido');
            echo $this->Form->input('quantidade_pedido');
            echo $this->Form->input('compra');
            echo $this->Form->input('margem');
            echo $this->Form->input('venda');
            echo $this->Form->input('promocao');
            echo $this->Form->input('estoque_minimo');
            echo $this->Form->input('estoque_atual');
            echo $this->Form->input('atalho');
            echo $this->Form->input('nome_atalho');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
