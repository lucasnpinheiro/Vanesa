<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Apagar'), ['controller' => 'Apagar', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Apagar'), ['controller' => 'Apagar', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Caixas Diarios'), ['controller' => 'CaixasDiarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Caixas Diario'), ['controller' => 'CaixasDiarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas Tipos'), ['controller' => 'PessoasTipos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoas Tipo'), ['controller' => 'PessoasTipos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoas form large-9 medium-8 columns content">
    <?= $this->Form->create($pessoa) ?>
    <fieldset>
        <legend><?= __('Add Pessoa') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('status');
            echo $this->Form->input('endereco');
            echo $this->Form->input('numero');
            echo $this->Form->input('bairro');
            echo $this->Form->input('cidade');
            echo $this->Form->input('estado');
            echo $this->Form->input('cep');
            echo $this->Form->input('fone1');
            echo $this->Form->input('fone2');
            echo $this->Form->input('cnpj');
            echo $this->Form->input('incricao');
            echo $this->Form->input('username');
            echo $this->Form->input('senha');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
