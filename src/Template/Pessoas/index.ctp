<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Apagar'), ['controller' => 'Apagar', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Apagar'), ['controller' => 'Apagar', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Caixas Diarios'), ['controller' => 'CaixasDiarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Caixas Diario'), ['controller' => 'CaixasDiarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas Tipos'), ['controller' => 'PessoasTipos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoas Tipo'), ['controller' => 'PessoasTipos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoas index large-9 medium-8 columns content">
    <h3><?= __('Pessoas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('endereco') ?></th>
                <th><?= $this->Paginator->sort('numero') ?></th>
                <th><?= $this->Paginator->sort('bairro') ?></th>
                <th><?= $this->Paginator->sort('cidade') ?></th>
                <th><?= $this->Paginator->sort('estado') ?></th>
                <th><?= $this->Paginator->sort('cep') ?></th>
                <th><?= $this->Paginator->sort('fone1') ?></th>
                <th><?= $this->Paginator->sort('fone2') ?></th>
                <th><?= $this->Paginator->sort('cnpj') ?></th>
                <th><?= $this->Paginator->sort('incricao') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('senha') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoas as $pessoa): ?>
            <tr>
                <td><?= $this->Number->format($pessoa->id) ?></td>
                <td><?= h($pessoa->nome) ?></td>
                <td><?= $this->Number->format($pessoa->status) ?></td>
                <td><?= h($pessoa->endereco) ?></td>
                <td><?= h($pessoa->numero) ?></td>
                <td><?= h($pessoa->bairro) ?></td>
                <td><?= h($pessoa->cidade) ?></td>
                <td><?= h($pessoa->estado) ?></td>
                <td><?= h($pessoa->cep) ?></td>
                <td><?= h($pessoa->fone1) ?></td>
                <td><?= h($pessoa->fone2) ?></td>
                <td><?= h($pessoa->cnpj) ?></td>
                <td><?= h($pessoa->incricao) ?></td>
                <td><?= h($pessoa->username) ?></td>
                <td><?= h($pessoa->senha) ?></td>
                <td><?= h($pessoa->created) ?></td>
                <td><?= h($pessoa->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pessoa->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pessoa->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pessoa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoa->id)]) ?>
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
