<?php
$_apagar = [];
foreach ($apagar as $key => $value) {
    if (!isset($_apagar[$value->data_vencimento->format('Y-m-d')])) {
        $_apagar[$value->data_vencimento->format('Y-m-d')]['total'][1] = 0;
        $_apagar[$value->data_vencimento->format('Y-m-d')]['total'][2] = 0;
        $_apagar[$value->data_vencimento->format('Y-m-d')]['lista'] = [];
    }
    $_apagar[$value->data_vencimento->format('Y-m-d')]['lista'][] = $value;
    $_apagar[$value->data_vencimento->format('Y-m-d')]['total'][$value->tipo] += $value->valor_documento;
}

//debug($_apagar);
//exit;
?>


<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - Relatório' ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('Novo cadastro', ['action' => 'add'], ['icon' => 'fa fa-plus-circle', 'title' => 'Novo cadastro']); ?></li>
            <li><?php echo $this->Html->link('Relatórios', ['action' => 'relatorios'], ['icon' => 'fa fa-list-alt', 'title' => 'Relatórios']); ?></li>
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
                echo $this->Form->data('data_inicio', ['label' => false, 'placeholder' => 'Data Inicio']);
                echo $this->Form->data('data_fim', ['label' => false, 'placeholder' => 'Data Fim']);
                echo $this->Form->statusContas('status', ['label' => false, 'placeholder' => 'Situação']);
                echo $this->Form->tiposPagamentos('tipo', ['label' => false, 'placeholder' => 'Tipo']);
                echo $this->Form->button('Consultar', ['type' => 'submit', 'icon' => 'search']);
                echo $this->Form->end();
                ?>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="table-responsive">


        <?php
        foreach ($_apagar as $key => $value) {
            ?>
            <div class="col-xs-12">
                <table class="table table-bordered table-striped font-12 table-hover">
                    <thead>
                        <tr>
                            <th style="width: 20%;">Documento</th>
                            <th style="width: 10%;">Situação</th>
                            <th style="width: 10%;">Tipo</th>
                            <th style="width: 30%;">Fornecedor</th>
                            <th style="width: 15%;">Data Vencimento</th>
                            <th style="width: 15%;">Valor Documento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($value['lista'] as $k => $v) {
                            ?>
                            <tr>
                                <td><?php echo $v->numero_documento; ?></td>
                                <td class="text-center"><?php echo $this->Html->statusContas($v->status); ?></td>
                                <td class="text-center"><?php echo $this->Html->pagamentos($v->tipo); ?></td>
                                <td><?php echo $v->pessoa->nome; ?></td>
                                <td><?php echo $v->data_vencimento->format('d/m/Y'); ?></td>
                                <td class="text-right"><?php echo $this->Html->moeda($v->valor_documento); ?></td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-center" colspan="3">Total a vista: <?php echo $this->Html->moeda($value['total'][1]); ?></td>
                            <td class="text-center" colspan="3">Total a prazo: <?php echo $this->Html->moeda($value['total'][2]); ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <?php
        }
        ?>

    </div><!-- /.table-responsive -->
    <div class="panel-footer">
        <div class="col-xs-12 font-12 text-center-xs text-right">
            <!-- button onclick="print();" class="btn btn-primary"><i class="fa fa-print"></i> Imprimir</button -->
            <?php echo $this->Html->link('<i class="fa fa-print"></i> Imprimir', array_merge($this->request->query, ['imprimir' => 'S']), ['class' => 'btn btn-primary']); ?>
        </div><!-- /.row -->
        <div class="clearfix"></div>
    </div>
</div>
