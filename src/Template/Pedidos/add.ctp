<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('Add') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('Novo cadastro', ['action' => 'add'], ['icon' => 'fa fa-plus-circle', 'title' => 'Novo cadastro']); ?></li>
            <li><?php echo $this->Html->link('Consultas', ['action' => 'index', '?' => ['status' => 0]], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
        </ul>

    </div>
    <div class="panel-body">
        <?php //debug($pedido) ?>
        <?= $this->Form->create($pedido, ['onsubmit' => 'return false;']) ?>
        <div class="col-xs-12 col-md-7">
            <?php
            echo $this->Form->input('data_pedido', ['value' => date('d/m/Y'), 'type' => 'hidden']);
            echo $this->Form->input('status', ['value' => 0, 'type' => 'hidden']);
            echo $this->Form->input('ficha', ['autofocus' => true, 'div' => [ 'class' => 'col-xs-12 col-md-2']]);
            echo $this->Form->input('nome_cliente', ['div' => ['class' => 'col-xs-12 col-md-10']]);
            ?>

            <div class="col-xs-12 col-md-6">
                <?php echo $this->Form->input('produto', ['type' => 'text', 'class' => 'produtos_barra', 'list' => 'codigo_produtos', 'empty' => 'Informe um produto', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?>
                <datalist id="codigo_produtos">
                    <?php
                    foreach ($produtos_lista as $key => $value)
                    {
                        echo '<option value="' . $value . '">';
                    }
                    ?>
                </datalist>
            </div>
            <div class="col-xs-12 col-md-6">
                <?php echo $this->Form->input('produto_id', ['options' => $produtos, 'empty' => 'Informe um produto', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?>
            </div>

            <div>
                <table class="table table-bordered table-condensed table-hover table-striped" style="margin: 0; padding: 0;">
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
                    <table class="table table-bordered table-condensed table-hover table-striped" style="margin: 0; padding: 0;">
                        <tbody class="add-itens-produtos">
                            <?php
                            if (!empty($pedido->pedidos_itens))
                            {
                                foreach ($pedido->pedidos_itens as $key => $value)
                                {
                                    ?>
                                    <tr rel="<?php echo $value->sequencia ?>" identificacao="<?php echo $value->produto_id ?>">
                                        <td style="width: 27%"><?php echo $value->produto->nome ?></td>
                                        <td style="width: 15%" class="td-qtd"><?php echo $this->Html->quantidade($value->quantidade) ?></td>
                                        <td style="width: 15%"><?php echo $this->Html->moeda($value->valor_venda, ['append' => null]) ?></td>
                                        <td style="width: 20%" class="td-desconto"><?php echo $this->Number->toPercentage($value->perc_desconto) ?></td>
                                        <td style="width: 20%" class="td-total"><?php echo $this->Html->moeda($value->valor_liquido) ?></td>
                                        <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;">
                                            <a href="#" icondirection="left" class="bt-item-remover btn btn-xs ">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
        <div class="col-xs-12 col-md-5">
            <?php
            echo $this->Form->moeda('valor_total', ['append' => null, 'readonly' => true, 'label' => 'Total', 'div' => ['class' => 'col-xs-12 col-md-4'], 'style' => 'font-size: 24px;']);
            echo $this->Form->moeda('valor_desconto', ['append' => null, 'readonly' => true, 'label' => 'Desconto', 'div' => ['class' => 'col-xs-12 col-md-4'], 'style' => 'color: red;font-size: 24px;']);
            echo $this->Form->moeda('valor_liquido', ['append' => null, 'readonly' => true, 'label' => 'Liquido', 'div' => ['class' => 'col-xs-12 col-md-4'], 'style' => 'color: blue;font-size: 24px;']);
            ?>

            <?php
            if (!empty($produtos_botoes))
            {
                foreach ($produtos_botoes as $key => $value)
                {
                    echo $this->Html->link($value->nome_atalho, '', ['rel' => $value->id, 'class' => 'produto-atalho btn btn-info btn-xs', 'style' => 'padding: 2px; margin: 0.5%; width: 23.5%;', 'role' => "button"]);
                }
            }
            ?>
        </div>
        <div class="clearfix"></div>
        <div style="margin: 20px;"></div>
        <hr>
        <div class="col-xs-12 col-md-8 text-left" style="margin: 0px; padding: 0px;">
            <?php
            echo $this->Form->moeda('valor_dinheiro', ['append' => null, 'label' => 'Dinheiro', 'div' => ['class' => 'col-xs-12 col-md-3'], 'style' => 'font-size: 24px;']);
            echo $this->Form->moeda('valor_cheque', ['append' => null, 'label' => 'Cheque', 'div' => ['class' => 'col-xs-12 col-md-2'], 'style' => 'font-size: 24px; color: green;']);
            echo $this->Form->moeda('valor_cartao', ['append' => null, 'label' => 'Cartão', 'div' => ['class' => 'col-xs-12 col-md-3'], 'style' => 'font-size: 24px; color: green;']);
            echo $this->Form->moeda('valor_recebe', ['append' => null, 'readonly' => true, 'label' => 'Recebido', 'div' => ['class' => 'col-xs-12 col-md-2'], 'style' => 'font-size: 24px; color: blue;']);
            echo $this->Form->moeda('valor_troco', ['append' => null, 'readonly' => true, 'label' => 'Troco', 'div' => ['class' => 'col-xs-12 col-md-2'], 'style' => 'font-size: 24px; color: red;']);
            ?>
        </div>
        <div class="col-xs-12 col-md-4 text-right" style="padding: 20px 0px 0px 0px; margin: 0px;">
            <?php
            echo $this->Form->button(__('Manter Aberto'), ['type' => 'button', 'id' => 'novo-pedido', 'icon' => 'file-o', 'class' => 'btn-success']);
            echo $this->Form->button(__('Finalizar'), ['type' => 'button', 'id' => 'finalizar-pedido', 'class' => 'btn-primary']);
            echo $this->Form->button(__('Cancelar'), ['type' => 'button', 'id' => 'cancelar-pedido', 'icon' => 'close', 'class' => 'btn-danger']);
            ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>


<?php
$this->Html->script('/js/select2.min.js', ['block' => 'script']);
$this->Html->css('/css/select2.min.css', ['block' => 'css']);
$this->Html->script('/js/pedidos.js', ['block' => 'script']);
?>
<?php $this->Html->scriptBlock('cake.pedidos.itens = ' . json_encode($lista_produtos) . ';', ['block' => 'script']); ?>