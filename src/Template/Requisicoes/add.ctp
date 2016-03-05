<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requisicoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requisicoes form large-9 medium-8 columns content">
    <?= $this->Form->create($requisico) ?>
    <fieldset>
        <legend><?= __('Add Requisico') ?></legend>
        <?php
            echo $this->Form->input('numero_documento');
            echo $this->Form->input('data', ['empty' => true]);
            echo $this->Form->input('produto_id', ['options' => $produtos, 'empty' => true]);
            echo $this->Form->input('tipo');
            echo $this->Form->input('quantidade');
            echo $this->Form->input('motivo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
