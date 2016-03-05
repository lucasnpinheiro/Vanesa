<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requisico'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requisicoes index large-9 medium-8 columns content">
    <h3><?= __('Requisicoes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('numero_documento') ?></th>
                <th><?= $this->Paginator->sort('data') ?></th>
                <th><?= $this->Paginator->sort('produto_id') ?></th>
                <th><?= $this->Paginator->sort('tipo') ?></th>
                <th><?= $this->Paginator->sort('quantidade') ?></th>
                <th><?= $this->Paginator->sort('motivo') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requisicoes as $requisico): ?>
            <tr>
                <td><?= $this->Number->format($requisico->id) ?></td>
                <td><?= h($requisico->numero_documento) ?></td>
                <td><?= h($requisico->data) ?></td>
                <td><?= $requisico->has('produto') ? $this->Html->link($requisico->produto->id, ['controller' => 'Produtos', 'action' => 'view', $requisico->produto->id]) : '' ?></td>
                <td><?= $this->Number->format($requisico->tipo) ?></td>
                <td><?= $this->Number->format($requisico->quantidade) ?></td>
                <td><?= h($requisico->motivo) ?></td>
                <td><?= h($requisico->created) ?></td>
                <td><?= h($requisico->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requisico->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requisico->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requisico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisico->id)]) ?>
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
