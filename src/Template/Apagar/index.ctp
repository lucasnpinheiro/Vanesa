<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Apagar'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="apagar index large-9 medium-8 columns content">
    <h3><?= __('Apagar') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('numero documento') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th><?= $this->Paginator->sort('data_vencimento') ?></th>
                <th><?= $this->Paginator->sort('valor_codumento') ?></th>
                <th><?= $this->Paginator->sort('tipo') ?></th>
                <th><?= $this->Paginator->sort('historico') ?></th>
                <th><?= $this->Paginator->sort('data_pagamento') ?></th>
                <th><?= $this->Paginator->sort('valor_pagamento') ?></th>
                <th><?= $this->Paginator->sort('valor_acrescimo') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($apagar as $apagar): ?>
            <tr>
                <td><?= $this->Number->format($apagar->id) ?></td>
                <td><?= h($apagar->numero documento) ?></td>
                <td><?= $this->Number->format($apagar->status) ?></td>
                <td><?= $apagar->has('pessoa') ? $this->Html->link($apagar->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $apagar->pessoa->id]) : '' ?></td>
                <td><?= h($apagar->data_vencimento) ?></td>
                <td><?= $this->Number->format($apagar->valor_codumento) ?></td>
                <td><?= $this->Number->format($apagar->tipo) ?></td>
                <td><?= h($apagar->historico) ?></td>
                <td><?= h($apagar->data_pagamento) ?></td>
                <td><?= $this->Number->format($apagar->valor_pagamento) ?></td>
                <td><?= $this->Number->format($apagar->valor_acrescimo) ?></td>
                <td><?= h($apagar->created) ?></td>
                <td><?= h($apagar->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $apagar->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $apagar->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $apagar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apagar->id)]) ?>
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
