<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Empresa'), ['action' => 'edit', $empresa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Empresa'), ['action' => 'delete', $empresa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empresa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="empresas view large-9 medium-8 columns content">
    <h3><?= h($empresa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($empresa->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Endereco') ?></th>
            <td><?= h($empresa->endereco) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero') ?></th>
            <td><?= h($empresa->numero) ?></td>
        </tr>
        <tr>
            <th><?= __('Bairro') ?></th>
            <td><?= h($empresa->bairro) ?></td>
        </tr>
        <tr>
            <th><?= __('Cidade') ?></th>
            <td><?= h($empresa->cidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= h($empresa->estado) ?></td>
        </tr>
        <tr>
            <th><?= __('Cep') ?></th>
            <td><?= h($empresa->cep) ?></td>
        </tr>
        <tr>
            <th><?= __('Cnpj') ?></th>
            <td><?= h($empresa->cnpj) ?></td>
        </tr>
        <tr>
            <th><?= __('Inscricao') ?></th>
            <td><?= h($empresa->inscricao) ?></td>
        </tr>
        <tr>
            <th><?= __('Fone1') ?></th>
            <td><?= h($empresa->fone1) ?></td>
        </tr>
        <tr>
            <th><?= __('Fone2') ?></th>
            <td><?= h($empresa->fone2) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($empresa->id) ?></td>
        </tr>
    </table>
</div>
