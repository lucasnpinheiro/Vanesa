<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pedido'), ['action' => 'edit', $pedido->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pedido'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos Itens'), ['controller' => 'PedidosItens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedidos Iten'), ['controller' => 'PedidosItens', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pedidos view large-9 medium-8 columns content">
    <h3><?= h($pedido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome Cliente') ?></th>
            <td><?= h($pedido->nome_cliente) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pedido->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Ficha') ?></th>
            <td><?= $this->Number->format($pedido->ficha) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($pedido->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Total') ?></th>
            <td><?= $this->Number->format($pedido->valor_total) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Desconto') ?></th>
            <td><?= $this->Number->format($pedido->valor_desconto) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Liquido') ?></th>
            <td><?= $this->Number->format($pedido->valor_liquido) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Dinheiro') ?></th>
            <td><?= $this->Number->format($pedido->valor_dinheiro) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Cheque') ?></th>
            <td><?= $this->Number->format($pedido->valor_cheque) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Cartao') ?></th>
            <td><?= $this->Number->format($pedido->valor_cartao) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Recebe') ?></th>
            <td><?= $this->Number->format($pedido->valor_recebe) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Troco') ?></th>
            <td><?= $this->Number->format($pedido->valor_troco) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Pedido') ?></th>
            <td><?= h($pedido->data_pedido) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pedido->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pedido->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pedidos Itens') ?></h4>
        <?php if (!empty($pedido->pedidos_itens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Pedido Id') ?></th>
                <th><?= __('Produto Id') ?></th>
                <th><?= __('Valor Venda') ?></th>
                <th><?= __('Quantidade') ?></th>
                <th><?= __('Valor Total') ?></th>
                <th><?= __('Perc Desconto') ?></th>
                <th><?= __('Valor Desconto') ?></th>
                <th><?= __('Valor Liquido') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions text-right"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pedido->pedidos_itens as $pedidosItens): ?>
            <tr>
                <td><?= h($pedidosItens->id) ?></td>
                <td><?= h($pedidosItens->pedido_id) ?></td>
                <td><?= h($pedidosItens->produto_id) ?></td>
                <td><?= h($pedidosItens->valor_venda) ?></td>
                <td><?= h($pedidosItens->quantidade) ?></td>
                <td><?= h($pedidosItens->valor_total) ?></td>
                <td><?= h($pedidosItens->perc_desconto) ?></td>
                <td><?= h($pedidosItens->valor_desconto) ?></td>
                <td><?= h($pedidosItens->valor_liquido) ?></td>
                <td><?= h($pedidosItens->created) ?></td>
                <td><?= h($pedidosItens->modified) ?></td>
                <td class="actions text-right">
                    <?= $this->Html->link(__('View'), ['controller' => 'PedidosItens', 'action' => 'view', $pedidosItens->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PedidosItens', 'action' => 'edit', $pedidosItens->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PedidosItens', 'action' => 'delete', $pedidosItens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidosItens->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
