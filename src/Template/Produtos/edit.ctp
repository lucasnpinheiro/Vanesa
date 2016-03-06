<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('Edit') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('', ['action' => 'add'], ['icon' => 'fa fa-plus-circle', 'title' => 'Novo cadastro']); ?></li>
            <li><?php echo $this->Html->link('', ['action' => 'index'], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
        </ul>

    </div>
    <div class="panel-body">
        <?= $this->Form->create($produto) ?>
        <?php
        echo $this->Form->input('nome');
            echo $this->Form->input('unidade');
            echo $this->Form->input('status');
            echo $this->Form->input('grupo_estoque_id');
            echo $this->Form->input('peso_baixa_estoque');
            echo $this->Form->input('desconto_pedido');
            echo $this->Form->input('quantidade_pedido');
            echo $this->Form->input('compra');
            echo $this->Form->input('margem');
            echo $this->Form->input('venda');
            echo $this->Form->input('promocao');
            echo $this->Form->input('estoque_minimo');
            echo $this->Form->input('estoque_atual');
            echo $this->Form->input('atalho');
            echo $this->Form->input('nome_atalho');
        ?>
        <div class="clearfix"></div>
        <div class="text-right">
            <?= $this->Form->button(__('Submit')) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>