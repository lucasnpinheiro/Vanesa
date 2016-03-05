<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Apagar'), ['action' => 'edit', $apagar->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Apagar'), ['action' => 'delete', $apagar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apagar->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Apagar'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Apagar'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="apagar view large-9 medium-8 columns content">
    <h3><?= h($apagar->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Numero Documento') ?></th>
            <td><?= h($apagar->numero documento) ?></td>
        </tr>
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $apagar->has('pessoa') ? $this->Html->link($apagar->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $apagar->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Historico') ?></th>
            <td><?= h($apagar->historico) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($apagar->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($apagar->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Codumento') ?></th>
            <td><?= $this->Number->format($apagar->valor_codumento) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $this->Number->format($apagar->tipo) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Pagamento') ?></th>
            <td><?= $this->Number->format($apagar->valor_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Acrescimo') ?></th>
            <td><?= $this->Number->format($apagar->valor_acrescimo) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Vencimento') ?></th>
            <td><?= h($apagar->data_vencimento) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Pagamento') ?></th>
            <td><?= h($apagar->data_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($apagar->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($apagar->modified) ?></td>
        </tr>
    </table>
</div>
