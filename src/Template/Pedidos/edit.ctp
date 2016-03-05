<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pedido->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos Itens'), ['controller' => 'PedidosItens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedidos Iten'), ['controller' => 'PedidosItens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($pedido) ?>
    <fieldset>
        <legend><?= __('Edit Pedido') ?></legend>
        <?php
            echo $this->Form->input('ficha');
            echo $this->Form->input('data_pedido', ['empty' => true]);
            echo $this->Form->input('status');
            echo $this->Form->input('nome_cliente');
            echo $this->Form->input('valor_total');
            echo $this->Form->input('valor_desconto');
            echo $this->Form->input('valor_liquido');
            echo $this->Form->input('valor_dinheiro');
            echo $this->Form->input('valor_cheque');
            echo $this->Form->input('valor_cartao');
            echo $this->Form->input('valor_recebe');
            echo $this->Form->input('valor_troco');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
