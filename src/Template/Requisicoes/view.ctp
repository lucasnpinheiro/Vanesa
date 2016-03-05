<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requisico'), ['action' => 'edit', $requisico->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requisico'), ['action' => 'delete', $requisico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisico->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requisicoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requisico'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requisicoes view large-9 medium-8 columns content">
    <h3><?= h($requisico->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Numero Documento') ?></th>
            <td><?= h($requisico->numero_documento) ?></td>
        </tr>
        <tr>
            <th><?= __('Produto') ?></th>
            <td><?= $requisico->has('produto') ? $this->Html->link($requisico->produto->id, ['controller' => 'Produtos', 'action' => 'view', $requisico->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Motivo') ?></th>
            <td><?= h($requisico->motivo) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($requisico->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $this->Number->format($requisico->tipo) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($requisico->quantidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Data') ?></th>
            <td><?= h($requisico->data) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($requisico->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($requisico->modified) ?></td>
        </tr>
    </table>
</div>
