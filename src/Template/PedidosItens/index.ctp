<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pedidos Iten'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pedidosItens index large-9 medium-8 columns content">
    <h3><?= __('Pedidos Itens') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pedido_id') ?></th>
                <th><?= $this->Paginator->sort('produto_id') ?></th>
                <th><?= $this->Paginator->sort('valor_venda') ?></th>
                <th><?= $this->Paginator->sort('quantidade') ?></th>
                <th><?= $this->Paginator->sort('valor_total') ?></th>
                <th><?= $this->Paginator->sort('perc_desconto') ?></th>
                <th><?= $this->Paginator->sort('valor_desconto') ?></th>
                <th><?= $this->Paginator->sort('valor_liquido') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidosItens as $pedidosIten): ?>
            <tr>
                <td><?= $this->Number->format($pedidosIten->id) ?></td>
                <td><?= $pedidosIten->has('pedido') ? $this->Html->link($pedidosIten->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $pedidosIten->pedido->id]) : '' ?></td>
                <td><?= $pedidosIten->has('produto') ? $this->Html->link($pedidosIten->produto->id, ['controller' => 'Produtos', 'action' => 'view', $pedidosIten->produto->id]) : '' ?></td>
                <td><?= $this->Number->format($pedidosIten->valor_venda) ?></td>
                <td><?= $this->Number->format($pedidosIten->quantidade) ?></td>
                <td><?= $this->Number->format($pedidosIten->valor_total) ?></td>
                <td><?= $this->Number->format($pedidosIten->perc_desconto) ?></td>
                <td><?= $this->Number->format($pedidosIten->valor_desconto) ?></td>
                <td><?= $this->Number->format($pedidosIten->valor_liquido) ?></td>
                <td><?= h($pedidosIten->created) ?></td>
                <td><?= h($pedidosIten->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pedidosIten->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pedidosIten->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedidosIten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidosIten->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
