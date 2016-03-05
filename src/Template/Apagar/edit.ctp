<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $apagar->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $apagar->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Apagar'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="apagar form large-9 medium-8 columns content">
    <?= $this->Form->create($apagar) ?>
    <fieldset>
        <legend><?= __('Edit Apagar') ?></legend>
        <?php
            echo $this->Form->input('numero documento');
            echo $this->Form->input('status');
            echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true]);
            echo $this->Form->input('data_vencimento', ['empty' => true]);
            echo $this->Form->input('valor_codumento');
            echo $this->Form->input('tipo');
            echo $this->Form->input('historico');
            echo $this->Form->input('data_pagamento', ['empty' => true]);
            echo $this->Form->input('valor_pagamento');
            echo $this->Form->input('valor_acrescimo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
