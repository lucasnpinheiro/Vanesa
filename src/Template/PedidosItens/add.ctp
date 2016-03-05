<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pedidos Itens'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pedidosItens form large-9 medium-8 columns content">
    <?= $this->Form->create($pedidosIten) ?>
    <fieldset>
        <legend><?= __('Add Pedidos Iten') ?></legend>
        <?php
            echo $this->Form->input('pedido_id', ['options' => $pedidos, 'empty' => true]);
            echo $this->Form->input('produto_id', ['options' => $produtos, 'empty' => true]);
            echo $this->Form->input('valor_venda');
            echo $this->Form->input('quantidade');
            echo $this->Form->input('valor_total');
            echo $this->Form->input('perc_desconto');
            echo $this->Form->input('valor_desconto');
            echo $this->Form->input('valor_liquido');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
