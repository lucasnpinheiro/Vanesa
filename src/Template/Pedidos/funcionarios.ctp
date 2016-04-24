<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('View') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('Consultas', ['action' => 'funcionarios'], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
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
                echo $this->Form->pessoas('funcionario_id', ['label' => false], [6]);
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
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ficha') ?></th>
                    <th><?= $this->Paginator->sort('data_pedido') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('funcionario_id', 'Funcionario') ?></th>
                    <th><?= $this->Paginator->sort('valor_liquido', 'Valor') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions text-right"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                    <tr>
                        <td><?= $this->Number->format($pedido->id) ?></td>
                        <td><?= $this->Number->format($pedido->ficha) ?></td>
                        <td><?= h($pedido->data_pedido) ?></td>
                        <td><?= $this->Html->statusPedido($pedido->status) ?></td>
                        <td><?= h($pedido->funcionario->nome) ?></td>
                        <td><?= $this->Html->moeda($pedido->valor_liquido) ?></td>
                        <td><?= h($pedido->created) ?></td>
                        <td><?= h($pedido->modified) ?></td>
                        <td class="actions text-right">
                            <?php
                            if ($pedido->status === 0) {
                                $this->Html->link(null, ['action' => 'add', $pedido->id], ['class' => ' btn-warning  btn btn-xs ', 'icon' => 'pencil', 'title' => __('Edit')]);
                            }
                            ?>
                            <?= $this->Form->postLink(null, ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id), 'title' => __('Delete')]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- /.table-responsive -->
    <div class="panel-footer">
        <div class="row font-12 text-center-xs">
            <?php echo $this->element('Painel/paginacao') ?>
        </div><!-- /.row -->
    </div>
</div>