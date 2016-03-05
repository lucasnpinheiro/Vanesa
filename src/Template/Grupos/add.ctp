<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Grupos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Caixas Movimentos'), ['controller' => 'CaixasMovimentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Caixas Movimento'), ['controller' => 'CaixasMovimentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="grupos form large-9 medium-8 columns content">
    <?= $this->Form->create($grupo) ?>
    <fieldset>
        <legend><?= __('Add Grupo') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
