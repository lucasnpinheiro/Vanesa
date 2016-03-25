<?php
$grupos = [];
$gruposProdutos = [];
foreach ($gruposEstoques as $key => $value) {
    $grupos[$value->id] = $value->nome;
}
foreach ($produto as $key => $value) {
    $gruposProdutos[$value->grupos_estoque_id][] = $value;
}
?>


<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('View') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('Novo cadastro', ['action' => 'add'], ['icon' => 'fa fa-plus-circle', 'title' => 'Novo cadastro']); ?></li>
            <li><?php echo $this->Html->link('Consultas', ['action' => 'index'], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
        </ul>
    </div>
    <div class="panel-body">
        <div class="row">

            <div class="col-sm-12 col-md-12 text-right">
                <?php
                echo $this->Form->create(null, [
                    'inline' => true,
                    'label' => false
                ]);
                echo $this->Form->input('grupos_estoque_id', ['options' => $grupos, 'empty' => 'Selecione um grupo', 'label' => false, 'placeholder' => 'Grupos']);
                echo $this->Form->button('Consultar', ['type' => 'submit', 'icon' => 'search']);
                echo $this->Form->end();
                ?>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="table-responsive">


        <?php
        foreach ($grupos as $key => $value) {
            if (!empty($gruposProdutos[$key])) {
                ?>
                <div class="col-xs-12">
                    <h3><?php echo $value ?></h3>
                    <table class="table table-bordered table-striped font-12 table-hover">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Produto</th>
                                <th>Estoque Atual</th>
                                <th>Estoque Novo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($gruposProdutos[$key] as $k => $v) {
                                ?>
                                <tr>
                                    <td><?php echo $v->barra; ?></td>
                                    <td><?php echo $v->nome; ?></td>
                                    <td><?php echo $v->estoque_atual; ?></td>
                                    <td></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <?php
            }
        }
        ?>

    </div><!-- /.table-responsive -->
    <div class="panel-footer">
        <div class="row font-12 text-center-xs">
            <button onclick="print();">Imprimir</button>
        </div><!-- /.row -->
    </div>
</div>
