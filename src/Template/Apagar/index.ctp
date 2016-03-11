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
                    <th><?= $this->Paginator->sort('numero_documento') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                    <th><?= $this->Paginator->sort('data_vencimento') ?></th>
                    <th><?= $this->Paginator->sort('valor_codumento') ?></th>
                    <th><?= $this->Paginator->sort('tipo') ?></th>
                    <th class="actions text-right"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($apagar as $apagar): ?>
                    <tr>
                        <td><?= h($apagar->numero_documento) ?></td>
                        <td><?= $this->Number->format($apagar->status) ?></td>
                        <td><?= $apagar->has('pessoa') ? $this->Html->link($apagar->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $apagar->pessoa->id]) : '' ?></td>
                        <td><?= h($apagar->data_vencimento) ?></td>
                        <td><?= $this->Number->format($apagar->valor_codumento) ?></td>
                        <td><?= $this->Number->format($apagar->tipo) ?></td>
                        <td class="actions text-right">
                            <?= $this->Html->link(null, ['action' => 'edit', $apagar->id], ['title' => __('Edit')]) ?>
                            <?= $this->Form->postLink(null, ['action' => 'delete', $apagar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apagar->id), 'title' => __('Delete')]) ?>
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