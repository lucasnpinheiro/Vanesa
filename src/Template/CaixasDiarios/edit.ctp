<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $caixasDiario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $caixasDiario->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Caixas Diarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Caixas Movimentos'), ['controller' => 'CaixasMovimentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Caixas Movimento'), ['controller' => 'CaixasMovimentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="caixasDiarios form large-9 medium-8 columns content">
    <?= $this->Form->create($caixasDiario) ?>
    <fieldset>
        <legend><?= __('Edit Caixas Diario') ?></legend>
        <?php
            echo $this->Form->input('data', ['empty' => true]);
            echo $this->Form->input('terminal');
            echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
