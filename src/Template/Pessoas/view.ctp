<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pessoa'), ['action' => 'edit', $pessoa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pessoa'), ['action' => 'delete', $pessoa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Apagar'), ['controller' => 'Apagar', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Apagar'), ['controller' => 'Apagar', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Caixas Diarios'), ['controller' => 'CaixasDiarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caixas Diario'), ['controller' => 'CaixasDiarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas Tipos'), ['controller' => 'PessoasTipos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoas Tipo'), ['controller' => 'PessoasTipos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoas view large-9 medium-8 columns content">
    <h3><?= h($pessoa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($pessoa->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Endereco') ?></th>
            <td><?= h($pessoa->endereco) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero') ?></th>
            <td><?= h($pessoa->numero) ?></td>
        </tr>
        <tr>
            <th><?= __('Bairro') ?></th>
            <td><?= h($pessoa->bairro) ?></td>
        </tr>
        <tr>
            <th><?= __('Cidade') ?></th>
            <td><?= h($pessoa->cidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= h($pessoa->estado) ?></td>
        </tr>
        <tr>
            <th><?= __('Cep') ?></th>
            <td><?= h($pessoa->cep) ?></td>
        </tr>
        <tr>
            <th><?= __('Fone1') ?></th>
            <td><?= h($pessoa->fone1) ?></td>
        </tr>
        <tr>
            <th><?= __('Fone2') ?></th>
            <td><?= h($pessoa->fone2) ?></td>
        </tr>
        <tr>
            <th><?= __('Cnpj') ?></th>
            <td><?= h($pessoa->cnpj) ?></td>
        </tr>
        <tr>
            <th><?= __('Incricao') ?></th>
            <td><?= h($pessoa->incricao) ?></td>
        </tr>
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($pessoa->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Senha') ?></th>
            <td><?= h($pessoa->senha) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pessoa->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($pessoa->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pessoa->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pessoa->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Apagar') ?></h4>
        <?php if (!empty($pessoa->apagar)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Numero Documento') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Pessoa Id') ?></th>
                <th><?= __('Data Vencimento') ?></th>
                <th><?= __('Valor Codumento') ?></th>
                <th><?= __('Tipo') ?></th>
                <th><?= __('Historico') ?></th>
                <th><?= __('Data Pagamento') ?></th>
                <th><?= __('Valor Pagamento') ?></th>
                <th><?= __('Valor Acrescimo') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pessoa->apagar as $apagar): ?>
            <tr>
                <td><?= h($apagar->id) ?></td>
                <td><?= h($apagar->numero documento) ?></td>
                <td><?= h($apagar->status) ?></td>
                <td><?= h($apagar->pessoa_id) ?></td>
                <td><?= h($apagar->data_vencimento) ?></td>
                <td><?= h($apagar->valor_codumento) ?></td>
                <td><?= h($apagar->tipo) ?></td>
                <td><?= h($apagar->historico) ?></td>
                <td><?= h($apagar->data_pagamento) ?></td>
                <td><?= h($apagar->valor_pagamento) ?></td>
                <td><?= h($apagar->valor_acrescimo) ?></td>
                <td><?= h($apagar->created) ?></td>
                <td><?= h($apagar->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Apagar', 'action' => 'view', $apagar->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Apagar', 'action' => 'edit', $apagar->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Apagar', 'action' => 'delete', $apagar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apagar->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Caixas Diarios') ?></h4>
        <?php if (!empty($pessoa->caixas_diarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Data') ?></th>
                <th><?= __('Terminal') ?></th>
                <th><?= __('Pessoa Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pessoa->caixas_diarios as $caixasDiarios): ?>
            <tr>
                <td><?= h($caixasDiarios->id) ?></td>
                <td><?= h($caixasDiarios->data) ?></td>
                <td><?= h($caixasDiarios->terminal) ?></td>
                <td><?= h($caixasDiarios->pessoa_id) ?></td>
                <td><?= h($caixasDiarios->created) ?></td>
                <td><?= h($caixasDiarios->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CaixasDiarios', 'action' => 'view', $caixasDiarios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CaixasDiarios', 'action' => 'edit', $caixasDiarios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CaixasDiarios', 'action' => 'delete', $caixasDiarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caixasDiarios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pessoas Tipos') ?></h4>
        <?php if (!empty($pessoa->pessoas_tipos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Pessoa Id') ?></th>
                <th><?= __('Tipo') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pessoa->pessoas_tipos as $pessoasTipos): ?>
            <tr>
                <td><?= h($pessoasTipos->id) ?></td>
                <td><?= h($pessoasTipos->pessoa_id) ?></td>
                <td><?= h($pessoasTipos->tipo) ?></td>
                <td><?= h($pessoasTipos->created) ?></td>
                <td><?= h($pessoasTipos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PessoasTipos', 'action' => 'view', $pessoasTipos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PessoasTipos', 'action' => 'edit', $pessoasTipos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PessoasTipos', 'action' => 'delete', $pessoasTipos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasTipos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
