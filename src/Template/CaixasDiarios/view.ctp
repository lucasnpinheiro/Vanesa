<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Caixas Diario'), ['action' => 'edit', $caixasDiario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Caixas Diario'), ['action' => 'delete', $caixasDiario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caixasDiario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Caixas Diarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caixas Diario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Caixas Movimentos'), ['controller' => 'CaixasMovimentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caixas Movimento'), ['controller' => 'CaixasMovimentos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="caixasDiarios view large-9 medium-8 columns content">
    <h3><?= h($caixasDiario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $caixasDiario->has('pessoa') ? $this->Html->link($caixasDiario->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $caixasDiario->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($caixasDiario->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Terminal') ?></th>
            <td><?= $this->Number->format($caixasDiario->terminal) ?></td>
        </tr>
        <tr>
            <th><?= __('Data') ?></th>
            <td><?= h($caixasDiario->data) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($caixasDiario->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($caixasDiario->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Caixas Movimentos') ?></h4>
        <?php if (!empty($caixasDiario->caixas_movimentos)): ?>
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
            <?php foreach ($caixasDiario->caixas_movimentos as $caixasMovimentos): ?>
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
