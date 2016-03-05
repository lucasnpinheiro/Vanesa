<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="empresas index large-9 medium-8 columns content">
    <h3><?= __('Empresas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('endereco') ?></th>
                <th><?= $this->Paginator->sort('numero') ?></th>
                <th><?= $this->Paginator->sort('bairro') ?></th>
                <th><?= $this->Paginator->sort('cidade') ?></th>
                <th><?= $this->Paginator->sort('estado') ?></th>
                <th><?= $this->Paginator->sort('cep') ?></th>
                <th><?= $this->Paginator->sort('cnpj') ?></th>
                <th><?= $this->Paginator->sort('inscricao') ?></th>
                <th><?= $this->Paginator->sort('fone1') ?></th>
                <th><?= $this->Paginator->sort('fone2') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empresas as $empresa): ?>
            <tr>
                <td><?= $this->Number->format($empresa->id) ?></td>
                <td><?= h($empresa->nome) ?></td>
                <td><?= h($empresa->endereco) ?></td>
                <td><?= h($empresa->numero) ?></td>
                <td><?= h($empresa->bairro) ?></td>
                <td><?= h($empresa->cidade) ?></td>
                <td><?= h($empresa->estado) ?></td>
                <td><?= h($empresa->cep) ?></td>
                <td><?= h($empresa->cnpj) ?></td>
                <td><?= h($empresa->inscricao) ?></td>
                <td><?= h($empresa->fone1) ?></td>
                <td><?= h($empresa->fone2) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $empresa->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $empresa->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $empresa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empresa->id)]) ?>
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
