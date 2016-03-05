<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Caixas Movimento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Caixas Diarios'), ['controller' => 'CaixasDiarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Caixas Diario'), ['controller' => 'CaixasDiarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Grupos'), ['controller' => 'Grupos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grupo'), ['controller' => 'Grupos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="caixasMovimentos index large-9 medium-8 columns content">
    <h3><?= __('Caixas Movimentos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('caixas_diario_id') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('valor') ?></th>
                <th><?= $this->Paginator->sort('descricao') ?></th>
                <th><?= $this->Paginator->sort('grupo_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($caixasMovimentos as $caixasMovimento): ?>
            <tr>
                <td><?= $this->Number->format($caixasMovimento->id) ?></td>
                <td><?= $caixasMovimento->has('caixas_diario') ? $this->Html->link($caixasMovimento->caixas_diario->id, ['controller' => 'CaixasDiarios', 'action' => 'view', $caixasMovimento->caixas_diario->id]) : '' ?></td>
                <td><?= $this->Number->format($caixasMovimento->status) ?></td>
                <td><?= $this->Number->format($caixasMovimento->valor) ?></td>
                <td><?= h($caixasMovimento->descricao) ?></td>
                <td><?= $caixasMovimento->has('grupo') ? $this->Html->link($caixasMovimento->grupo->id, ['controller' => 'Grupos', 'action' => 'view', $caixasMovimento->grupo->id]) : '' ?></td>
                <td><?= h($caixasMovimento->created) ?></td>
                <td><?= h($caixasMovimento->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $caixasMovimento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $caixasMovimento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $caixasMovimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caixasMovimento->id)]) ?>
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
