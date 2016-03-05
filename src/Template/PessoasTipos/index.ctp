<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pessoas Tipo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasTipos index large-9 medium-8 columns content">
    <h3><?= __('Pessoas Tipos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th><?= $this->Paginator->sort('tipo') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoasTipos as $pessoasTipo): ?>
            <tr>
                <td><?= $this->Number->format($pessoasTipo->id) ?></td>
                <td><?= $pessoasTipo->has('pessoa') ? $this->Html->link($pessoasTipo->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoasTipo->pessoa->id]) : '' ?></td>
                <td><?= $this->Number->format($pessoasTipo->tipo) ?></td>
                <td><?= h($pessoasTipo->created) ?></td>
                <td><?= h($pessoasTipo->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pessoasTipo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pessoasTipo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pessoasTipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasTipo->id)]) ?>
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
