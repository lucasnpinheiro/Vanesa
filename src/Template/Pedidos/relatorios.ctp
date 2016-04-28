<?php $totais = []; ?>
<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('View') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('Consultas', ['action' => 'relatorios'], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
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
                echo $this->Form->button('Consultar', ['type' => 'submit', 'icon' => 'search']);
                echo $this->Form->end();
                ?>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped font-12 table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Ficha</th>
                    <th>Data pedido</th>
                    <th>Situação</th>
                    <th>Cliente</th>
                    <th>Valor</th>
                    <th><?= __('created') ?></th>
                    <th><?= __('modified') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totais['valor_total'] = 0;
                $totais['valor_desconto'] = 0;
                $totais['valor_liquido'] = 0;
                $totais['valor_dinheiro'] = 0;
                $totais['valor_cheque'] = 0;
                $totais['valor_cartao'] = 0;
                $totais['valor_troco'] = 0;
                $totais['valor_prazo'] = 0;
                foreach ($pedidos as $pedido):
                    $totais['valor_total'] += $pedido->valor_total;
                    $totais['valor_desconto'] += $pedido->valor_desconto;
                    $totais['valor_liquido'] += $pedido->valor_liquido;
                    $totais['valor_dinheiro'] += $pedido->valor_dinheiro;
                    $totais['valor_cheque'] += $pedido->valor_cheque;
                    $totais['valor_cartao'] += $pedido->valor_cartao;
                    $totais['valor_troco'] += $pedido->valor_troco;
                    $totais['valor_prazo'] += $pedido->valor_prazo;
                    ?>
                    <tr>
                        <td><?= $this->Number->format($pedido->id) ?></td>
                        <td><?= $this->Number->format($pedido->ficha) ?></td>
                        <td><?= h($pedido->data_pedido) ?></td>
                        <td><?= $this->Html->statusPedido($pedido->status) ?></td>
                        <td><?= h($pedido->nome_cliente) ?></td>
                        <td><?= $this->Html->moeda($pedido->valor_liquido) ?></td>
                        <td><?= h($pedido->created) ?></td>
                        <td><?= h($pedido->modified) ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <div class="clearfix"></div>
    <div class="col-xs-12">
        <h4>Totalizadores</h4>
        <div>
            <div class="col-xs-12 col-md-4 text-center">
                <div class="col-xs-12 col-md-6 text-center">Valor Total</div>
                <div class="col-xs-12 col-md-6 text-center"><?php echo $this->Html->moeda($totais['valor_total']); ?></div>
            </div>
            <div class="col-xs-12 col-md-4 text-center">
                <div class="col-xs-12 col-md-6 text-center">Descontos</div>
                <div class="col-xs-12 col-md-6 text-center" style="color: red;"><?php echo $this->Html->moeda($totais['valor_desconto']); ?></div>
            </div>
            <div class="col-xs-12 col-md-4 text-center">
                <div class="col-xs-12 col-md-6 text-center">Valor Liquido</div>
                <div class="col-xs-12 col-md-6 text-center"><?php echo $this->Html->moeda($totais['valor_liquido']); ?></div>
            </div>
            <div class="col-xs-12 col-md-3 text-center">
                <div class="col-xs-12 col-md-6 text-center">Dinheiro</div>
                <div class="col-xs-12 col-md-6 text-center"><?php echo $this->Html->moeda($totais['valor_dinheiro']); ?></div>
            </div>
            <div class="col-xs-12 col-md-3 text-center">
                <div class="col-xs-12 col-md-6 text-center">Cheque</div>
                <div class="col-xs-12 col-md-6 text-center"><?php echo $this->Html->moeda($totais['valor_cheque']); ?></div>
            </div>
            <div class="col-xs-12 col-md-3 text-center">
                <div class="col-xs-12 col-md-6 text-center">Cartão</div>
                <div class="col-xs-12 col-md-6 text-center"><?php echo $this->Html->moeda($totais['valor_cartao']); ?></div>
            </div>
            <div class="col-xs-12 col-md-3 text-center">
                <div class="col-xs-12 col-md-6 text-center">Prazo</div>
                <div class="col-xs-12 col-md-6 text-center"><?php echo $this->Html->moeda($totais['valor_prazo']); ?></div>
            </div>
        </div>
    </div><!-- /.table-responsive -->
    <div class="clearfix"></div>
    <div class="panel-footer">
        <div class="row font-12 text-center-xs">
        </div><!-- /.row -->
    </div>
</div>