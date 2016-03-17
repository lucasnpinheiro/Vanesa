<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('Add') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('Novo cadastro', ['action' => 'add'], ['icon' => 'fa fa-plus-circle', 'title' => 'Novo cadastro']); ?></li>
            <li><?php echo $this->Html->link('Consultas', ['action' => 'index'], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
        </ul>

    </div>
    <div class="panel-body">
        <?= $this->Form->create($pedido) ?>
        <?php
        echo $this->Form->data('data_pedido', ['empty' => true, 'value' => date('d/m/Y'), 'div' => ['class' => 'col-xs-12 col-md-2']]);
        echo $this->Form->input('ficha', ['div' => ['autofocus' => true, 'class' => 'col-xs-12 col-md-2']]);
        echo $this->Form->statusPedido('status', ['value' => 1, 'div' => ['class' => 'col-xs-12 col-md-2']]);
        echo $this->Form->input('nome_cliente', ['div' => ['class' => 'col-xs-12 col-md-6']]);
        ?>
        <div class="col-xs-12 col-md-7">
            <div>
                <?php echo $this->Form->input('produto_id', ['div' => ['class' => 'col-xs-12 col-md-12']]); ?>
                <div>
                    <table class="table table-bordered table-condensed table-hover table-striped">
                        <thead>
                            <tr>
                                <th style="width: 25%">Produto</th>
                                <th style="width: 10%">Qtd.</th>
                                <th style="width: 20%">V. Unitario</th>
                                <th style="width: 20%">Desconto</th>
                                <th style="width: 20%">Total</th>
                                <th style="width: 5%"></th>
                            </tr>
                        </thead>
                    </table>
                    <div class="clearfix"></div>
                    <div style="max-height: 225px; overflow: auto;">
                        <table class="table table-bordered table-condensed table-hover table-striped">
                            <tbody>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 27%"></td>
                                    <td style="width: 10%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 20%"></td>
                                    <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;"><?= $this->Html->link('<i class="fa fa-trash"></i>', '#', ['class' => 'bt-item-remover']) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-5">
            <?php
            echo $this->Form->moeda('valor_total', ['readonly' => true, 'label' => 'Total', 'div' => ['class' => 'col-xs-12 col-md-4']]);
            echo $this->Form->moeda('valor_desconto', ['readonly' => true, 'label' => 'Desconto', 'div' => ['class' => 'col-xs-12 col-md-4'], 'style' => 'color: red;']);
            echo $this->Form->moeda('valor_liquido', ['readonly' => true, 'label' => 'Liquido', 'div' => ['class' => 'col-xs-12 col-md-4'], 'style' => 'color: blue;']);
            echo $this->Form->moeda('valor_dinheiro', ['label' => 'Dinheiro', 'div' => ['class' => 'col-xs-12 col-md-4']]);
            echo $this->Form->moeda('valor_cheque', ['label' => 'Cheque', 'div' => ['class' => 'col-xs-12 col-md-4'], 'style' => 'color: green;']);
            echo $this->Form->moeda('valor_cartao', ['label' => 'Cartão', 'div' => ['class' => 'col-xs-12 col-md-4'], 'style' => 'color: green;']);
            echo $this->Form->moeda('valor_recebe', ['readonly' => true, 'label' => 'Recebido', 'div' => ['class' => 'col-xs-12 col-md-6'], 'style' => 'color: blue;']);
            echo $this->Form->moeda('valor_troco', ['readonly' => true, 'label' => 'Troco', 'div' => ['class' => 'col-xs-12 col-md-6'], 'style' => 'color: red;']);
            ?>
        </div>
        <div class="col-xs-12">
            
        </div>
        <div class="clearfix"></div>
        <div class="text-right">
            <?= $this->Form->button(__('Finalizar Pedidos')) ?>
            <?= $this->Form->button(__('Nova Ficha'), ['type' => 'button']) ?>
            <?= $this->Form->button(__('Cancelar'), ['type' => 'button']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>