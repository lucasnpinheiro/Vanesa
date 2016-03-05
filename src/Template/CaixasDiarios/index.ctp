<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Caixas Diario'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Caixas Movimentos'), ['controller' => 'CaixasMovimentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Caixas Movimento'), ['controller' => 'CaixasMovimentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="caixasDiarios index large-9 medium-8 columns content">
    <h3><?= __('Caixas Diarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('data') ?></th>
                <th><?= $this->Paginator->sort('terminal') ?></th>
                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($caixasDiarios as $caixasDiario): ?>
            <tr>
                <td><?= $this->Number->format($caixasDiario->id) ?></td>
                <td><?= h($caixasDiario->data) ?></td>
                <td><?= $this->Number->format($caixasDiario->terminal) ?></td>
                <td><?= $caixasDiario->has('pessoa') ? $this->Html->link($caixasDiario->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $caixasDiario->pessoa->id]) : '' ?></td>
                <td><?= h($caixasDiario->created) ?></td>
                <td><?= h($caixasDiario->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $caixasDiario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $caixasDiario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $caixasDiario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caixasDiario->id)]) ?>
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
