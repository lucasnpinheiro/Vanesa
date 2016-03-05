<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pessoas Tipo'), ['action' => 'edit', $pessoasTipo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pessoas Tipo'), ['action' => 'delete', $pessoasTipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasTipo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas Tipos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoas Tipo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoasTipos view large-9 medium-8 columns content">
    <h3><?= h($pessoasTipo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $pessoasTipo->has('pessoa') ? $this->Html->link($pessoasTipo->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoasTipo->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pessoasTipo->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $this->Number->format($pessoasTipo->tipo) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pessoasTipo->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pessoasTipo->modified) ?></td>
        </tr>
    </table>
</div>
