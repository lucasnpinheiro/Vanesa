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
                echo $this->Form->input('data', ['label' => false, 'placeholder' => 'Data']);
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
                    <th><?= $this->Paginator->sort('caixas_diario_id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('valor') ?></th>
                    <th><?= $this->Paginator->sort('descricao') ?></th>
                    <th><?= $this->Paginator->sort('grupo_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions text-right"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($caixasMovimentos as $caixasMovimento): ?>
                    <tr>
                        <td><?= $caixasMovimento->has('caixas_diario') ? $this->Html->link($caixasMovimento->caixas_diario->id, ['controller' => 'CaixasDiarios', 'action' => 'view', $caixasMovimento->caixas_diario->id]) : '' ?></td>
                        <td><?= $this->Number->format($caixasMovimento->status) ?></td>
                        <td><?= $this->Number->format($caixasMovimento->valor) ?></td>
                        <td><?= h($caixasMovimento->descricao) ?></td>
                        <td><?= $caixasMovimento->has('grupo') ? $this->Html->link($caixasMovimento->grupo->id, ['controller' => 'Grupos', 'action' => 'view', $caixasMovimento->grupo->id]) : '' ?></td>
                        <td><?= h($caixasMovimento->created) ?></td>
                        <td><?= h($caixasMovimento->modified) ?></td>
                        <td class="actions text-right">
                           <?= $this->Html->link(null, ['action' => 'edit', $caixasMovimento->id], ['title' => __('Edit')]) ?>
                            <?= $this->Form->postLink(null, ['action' => 'delete', $caixasMovimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caixasMovimento->id), 'title' => __('Delete')]) ?>
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