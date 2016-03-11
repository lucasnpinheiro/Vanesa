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
                echo $this->Form->input('nome', ['label' => false, 'placeholder' => 'Nome']);
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
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('estoque_global') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions text-right"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($gruposEstoques as $gruposEstoque):
                    ?>
                    <tr>
                        <td><?= h($gruposEstoque->nome) ?></td>
                        <td><?= h(!empty($gruposEstoque->produto) ? $gruposEstoque->produto->nome : 'Sem referências') ?></td>
                        <td><?= h($gruposEstoque->created) ?></td>
                        <td><?= h($gruposEstoque->modified) ?></td>
                        <td class="actions text-right">
                            <?= $this->Html->link(null, ['action' => 'edit', $gruposEstoque->id], ['title' => __('Edit')]) ?>
                            <?= $this->Form->postLink(null, ['action' => 'delete', $gruposEstoque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gruposEstoque->id), 'title' => __('Delete')]) ?>
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