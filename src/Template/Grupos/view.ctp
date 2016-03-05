<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grupo'), ['action' => 'edit', $grupo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grupo'), ['action' => 'delete', $grupo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grupo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Grupos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grupo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Caixas Movimentos'), ['controller' => 'CaixasMovimentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caixas Movimento'), ['controller' => 'CaixasMovimentos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="grupos view large-9 medium-8 columns content">
    <h3><?= h($grupo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($grupo->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($grupo->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($grupo->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($grupo->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($grupo->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Caixas Movimentos') ?></h4>
        <?php if (!empty($grupo->caixas_movimentos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Caixas Diario Id') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Valor') ?></th>
                <th><?= __('Descricao') ?></th>
                <th><?= __('Grupo Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($grupo->caixas_movimentos as $caixasMovimentos): ?>
            <tr>
                <td><?= h($caixasMovimentos->id) ?></td>
                <td><?= h($caixasMovimentos->caixas_diario_id) ?></td>
                <td><?= h($caixasMovimentos->status) ?></td>
                <td><?= h($caixasMovimentos->valor) ?></td>
                <td><?= h($caixasMovimentos->descricao) ?></td>
                <td><?= h($caixasMovimentos->grupo_id) ?></td>
                <td><?= h($caixasMovimentos->created) ?></td>
                <td><?= h($caixasMovimentos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CaixasMovimentos', 'action' => 'view', $caixasMovimentos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CaixasMovimentos', 'action' => 'edit', $caixasMovimentos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CaixasMovimentos', 'action' => 'delete', $caixasMovimentos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caixasMovimentos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
