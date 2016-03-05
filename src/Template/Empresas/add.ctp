<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="empresas form large-9 medium-8 columns content">
    <?= $this->Form->create($empresa) ?>
    <fieldset>
        <legend><?= __('Add Empresa') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('endereco');
            echo $this->Form->input('numero');
            echo $this->Form->input('bairro');
            echo $this->Form->input('cidade');
            echo $this->Form->input('estado');
            echo $this->Form->input('cep');
            echo $this->Form->input('cnpj');
            echo $this->Form->input('inscricao');
            echo $this->Form->input('fone1');
            echo $this->Form->input('fone2');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
