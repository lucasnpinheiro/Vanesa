<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Caixas Movimentos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Caixas Diarios'), ['controller' => 'CaixasDiarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Caixas Diario'), ['controller' => 'CaixasDiarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Grupos'), ['controller' => 'Grupos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grupo'), ['controller' => 'Grupos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="caixasMovimentos form large-9 medium-8 columns content">
    <?= $this->Form->create($caixasMovimento) ?>
    <fieldset>
        <legend><?= __('Add Caixas Movimento') ?></legend>
        <?php
            echo $this->Form->input('caixas_diario_id', ['options' => $caixasDiarios, 'empty' => true]);
            echo $this->Form->input('status');
            echo $this->Form->input('valor');
            echo $this->Form->input('descricao');
            echo $this->Form->input('grupo_id', ['options' => $grupos, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
