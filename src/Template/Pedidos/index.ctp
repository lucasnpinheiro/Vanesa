<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos Itens'), ['controller' => 'PedidosItens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedidos Iten'), ['controller' => 'PedidosItens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pedidos index large-9 medium-8 columns content">
    <h3><?= __('Pedidos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('ficha') ?></th>
                <th><?= $this->Paginator->sort('data_pedido') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('nome_cliente') ?></th>
                <th><?= $this->Paginator->sort('valor_total') ?></th>
                <th><?= $this->Paginator->sort('valor_desconto') ?></th>
                <th><?= $this->Paginator->sort('valor_liquido') ?></th>
                <th><?= $this->Paginator->sort('valor_dinheiro') ?></th>
                <th><?= $this->Paginator->sort('valor_cheque') ?></th>
                <th><?= $this->Paginator->sort('valor_cartao') ?></th>
                <th><?= $this->Paginator->sort('valor_recebe') ?></th>
                <th><?= $this->Paginator->sort('valor_troco') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions text-right"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido): ?>
            <tr>
                <td><?= $this->Number->format($pedido->id) ?></td>
                <td><?= $this->Number->format($pedido->ficha) ?></td>
                <td><?= h($pedido->data_pedido) ?></td>
                <td><?= $this->Number->format($pedido->status) ?></td>
                <td><?= h($pedido->nome_cliente) ?></td>
                <td><?= $this->Number->format($pedido->valor_total) ?></td>
                <td><?= $this->Number->format($pedido->valor_desconto) ?></td>
                <td><?= $this->Number->format($pedido->valor_liquido) ?></td>
                <td><?= $this->Number->format($pedido->valor_dinheiro) ?></td>
                <td><?= $this->Number->format($pedido->valor_cheque) ?></td>
                <td><?= $this->Number->format($pedido->valor_cartao) ?></td>
                <td><?= $this->Number->format($pedido->valor_recebe) ?></td>
                <td><?= $this->Number->format($pedido->valor_troco) ?></td>
                <td><?= h($pedido->created) ?></td>
                <td><?= h($pedido->modified) ?></td>
                <td class="actions text-right">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pedido->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pedido->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?>
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
