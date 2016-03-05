<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pedidos Iten'), ['action' => 'edit', $pedidosIten->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pedidos Iten'), ['action' => 'delete', $pedidosIten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidosIten->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos Itens'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedidos Iten'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pedidosItens view large-9 medium-8 columns content">
    <h3><?= h($pedidosIten->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pedido') ?></th>
            <td><?= $pedidosIten->has('pedido') ? $this->Html->link($pedidosIten->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $pedidosIten->pedido->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Produto') ?></th>
            <td><?= $pedidosIten->has('produto') ? $this->Html->link($pedidosIten->produto->id, ['controller' => 'Produtos', 'action' => 'view', $pedidosIten->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pedidosIten->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Venda') ?></th>
            <td><?= $this->Number->format($pedidosIten->valor_venda) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($pedidosIten->quantidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Total') ?></th>
            <td><?= $this->Number->format($pedidosIten->valor_total) ?></td>
        </tr>
        <tr>
            <th><?= __('Perc Desconto') ?></th>
            <td><?= $this->Number->format($pedidosIten->perc_desconto) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Desconto') ?></th>
            <td><?= $this->Number->format($pedidosIten->valor_desconto) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Liquido') ?></th>
            <td><?= $this->Number->format($pedidosIten->valor_liquido) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pedidosIten->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pedidosIten->modified) ?></td>
        </tr>
    </table>
</div>
