<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Caixas Movimento'), ['action' => 'edit', $caixasMovimento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Caixas Movimento'), ['action' => 'delete', $caixasMovimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caixasMovimento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Caixas Movimentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caixas Movimento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Caixas Diarios'), ['controller' => 'CaixasDiarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caixas Diario'), ['controller' => 'CaixasDiarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Grupos'), ['controller' => 'Grupos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grupo'), ['controller' => 'Grupos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="caixasMovimentos view large-9 medium-8 columns content">
    <h3><?= h($caixasMovimento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Caixas Diario') ?></th>
            <td><?= $caixasMovimento->has('caixas_diario') ? $this->Html->link($caixasMovimento->caixas_diario->id, ['controller' => 'CaixasDiarios', 'action' => 'view', $caixasMovimento->caixas_diario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Descricao') ?></th>
            <td><?= h($caixasMovimento->descricao) ?></td>
        </tr>
        <tr>
            <th><?= __('Grupo') ?></th>
            <td><?= $caixasMovimento->has('grupo') ? $this->Html->link($caixasMovimento->grupo->id, ['controller' => 'Grupos', 'action' => 'view', $caixasMovimento->grupo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($caixasMovimento->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($caixasMovimento->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= $this->Number->format($caixasMovimento->valor) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($caixasMovimento->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($caixasMovimento->modified) ?></td>
        </tr>
    </table>
</div>
