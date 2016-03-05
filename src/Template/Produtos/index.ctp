<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos Itens'), ['controller' => 'PedidosItens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedidos Iten'), ['controller' => 'PedidosItens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requisicoes'), ['controller' => 'Requisicoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requisico'), ['controller' => 'Requisicoes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtos index large-9 medium-8 columns content">
    <h3><?= __('Produtos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('unidade') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('grupo_estoque_id') ?></th>
                <th><?= $this->Paginator->sort('peso_baixa_estoque') ?></th>
                <th><?= $this->Paginator->sort('desconto_pedido') ?></th>
                <th><?= $this->Paginator->sort('quantidade_pedido') ?></th>
                <th><?= $this->Paginator->sort('compra') ?></th>
                <th><?= $this->Paginator->sort('margem') ?></th>
                <th><?= $this->Paginator->sort('venda') ?></th>
                <th><?= $this->Paginator->sort('promocao') ?></th>
                <th><?= $this->Paginator->sort('estoque_minimo') ?></th>
                <th><?= $this->Paginator->sort('estoque_atual') ?></th>
                <th><?= $this->Paginator->sort('atalho') ?></th>
                <th><?= $this->Paginator->sort('nome_atalho') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= $this->Number->format($produto->id) ?></td>
                <td><?= h($produto->nome) ?></td>
                <td><?= h($produto->unidade) ?></td>
                <td><?= $this->Number->format($produto->status) ?></td>
                <td><?= $this->Number->format($produto->grupo_estoque_id) ?></td>
                <td><?= $this->Number->format($produto->peso_baixa_estoque) ?></td>
                <td><?= $this->Number->format($produto->desconto_pedido) ?></td>
                <td><?= $this->Number->format($produto->quantidade_pedido) ?></td>
                <td><?= $this->Number->format($produto->compra) ?></td>
                <td><?= $this->Number->format($produto->margem) ?></td>
                <td><?= $this->Number->format($produto->venda) ?></td>
                <td><?= $this->Number->format($produto->promocao) ?></td>
                <td><?= $this->Number->format($produto->estoque_minimo) ?></td>
                <td><?= $this->Number->format($produto->estoque_atual) ?></td>
                <td><?= $this->Number->format($produto->atalho) ?></td>
                <td><?= h($produto->nome_atalho) ?></td>
                <td><?= h($produto->created) ?></td>
                <td><?= h($produto->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]) ?>
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
