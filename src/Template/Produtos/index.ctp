<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . __('View') ?>
        <ul class="panel-toolbar list-unstyled font-12 m-d-3">
            <li><?php echo $this->Html->link('', ['action' => 'add'], ['icon' => 'fa fa-plus-circle', 'title' => 'Novo cadastro']); ?></li>
            <li><?php echo $this->Html->link('', ['action' => 'index'], ['icon' => 'fa fa-list-alt', 'title' => 'Consultas']); ?></li>
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
                echo $this->Form->input('nome', ['label' => false, 'placeholder' => 'Nome']);
                echo $this->Form->button('Consultar', ['type' => 'submit', 'icon' => 'search']);
                echo $this->Form->end();
                ?>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped font-12">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('unidade') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('grupo_estoque_id') ?></th>
                    <th><?= $this->Paginator->sort('peso_baixa_estoque') ?></th>
                    <th><?= $this->Paginator->sort('desconto_pedido') ?></th>
                    <th><?= $this->Paginator->sort('quantidade_pedido') ?></th>
                    <th><?= $this->Paginator->sort('compra') ?></th>
                    <th><?= $this->Paginator->sort('margem') ?></th>
                    <th><?= $this->Paginator->sort('venda') ?></th>
                    <th><?= $this->Paginator->sort('promocao') ?></th>
                    <th><?= $this->Paginator->sort('estoque_minimo') ?></th>
                    <th><?= $this->Paginator->sort('estoque_atual') ?></th>
                    <th><?= $this->Paginator->sort('atalho') ?></th>
                    <th><?= $this->Paginator->sort('nome_atalho') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?= $this->Number->format($produto->id) ?></td>
                        <td><?= h($produto->nome) ?></td>
                        <td><?= h($produto->unidade) ?></td>
                        <td><?= $this->Number->format($produto->status) ?></td>
                        <td><?= $this->Number->format($produto->grupo_estoque_id) ?></td>
                        <td><?= $this->Number->format($produto->peso_baixa_estoque) ?></td>
                        <td><?= $this->Number->format($produto->desconto_pedido) ?></td>
                        <td><?= $this->Number->format($produto->quantidade_pedido) ?></td>
                        <td><?= $this->Number->format($produto->compra) ?></td>
                        <td><?= $this->Number->format($produto->margem) ?></td>
                        <td><?= $this->Number->format($produto->venda) ?></td>
                        <td><?= $this->Number->format($produto->promocao) ?></td>
                        <td><?= $this->Number->format($produto->estoque_minimo) ?></td>
                        <td><?= $this->Number->format($produto->estoque_atual) ?></td>
                        <td><?= $this->Number->format($produto->atalho) ?></td>
                        <td><?= h($produto->nome_atalho) ?></td>
                        <td><?= h($produto->created) ?></td>
                        <td><?= h($produto->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $produto->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produto->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]) ?>
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