<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo $titulo_pagina . ' - ' . $caixasDiarios->data; ?>
    </div>

    <div class="panel-body">
        <div class="row">
            <?php echo $this->Form->create($caixasMovimento, ['url' => ['action' => 'add', $caixas_diario_id]]); ?>
            <?php
            echo $this->Form->input('caixas_diario_id', ['type' => 'hidden', 'value' => $caixas_diario_id]);
            echo $this->Form->input('status', ['type' => 'hidden', 'value' => 1]);
            echo $this->Form->statusMovimentos('grupo_id', ['required' => true, 'label' => 'Tipo', 'options' => [1 => 'Abertura', 2 => 'Entrada', 3 => 'Saída', 4 => 'Sangria'], 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-2']]);
            echo $this->Form->moeda('valor', ['div' => ['required' => true, 'class' => 'col-xs-12 col-md-3']]);
            echo $this->Form->input('descricao', ['required' => true, 'label' => 'Descrição', 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-7']]);
            ?>
            <div class="clearfix"></div>
            <div class="text-right">
                <?= $this->Form->button(__('Submit')) ?>
            </div>
            <?= $this->Form->end() ?>
        </div><!-- /.row -->
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped font-12 table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('valor') ?></th>
                    <th><?= $this->Paginator->sort('descricao', 'Descrição') ?></th>
                    <th><?= $this->Paginator->sort('grupo_id', 'Tipo') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($caixasMovimentos as $caixasMovimento): ?>
                    <tr>
                        <td><?= $this->Html->moeda($caixasMovimento->valor) ?></td>
                        <td><?= h($caixasMovimento->descricao) ?></td>
                        <td><?= $this->Html->statusMovimentos($caixasMovimento->grupo_id) ?></td>
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