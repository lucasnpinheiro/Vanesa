<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo 'Movimento do Operador ' . $caixasDiarios->pessoa->nome . ' - Terminal: ' . $caixasDiarios->terminai->nome . ' - Data: ' . $caixasDiarios->data; ?>
    </div>
    <div class="col-xs-12">
        <h3>Totalizadores do Movimento</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped font-12 table-hover">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($caixasMovimentos as $caixasMovimento): ?>
                        <tr>
                            <td><?= $this->Html->statusMovimentos($caixasMovimento->grupo_id) ?></td>
                            <td><?= $this->Html->moeda($caixasMovimento->valor) ?></td>
                            <td><?= h($caixasMovimento->descricao) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!-- /.table-responsive -->
        <div class="col-xs-12 col-md-3"></div>
        <div class="col-xs-12 col-md-6">
            <div class="col-xs-12 col-md-6">Saldo Inicial</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda($saldoInicial->total); ?></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-md-6">Entradas</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda($entradas->total); ?></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-md-6">Retiradas</div><div class="col-xs-12 col-md-6 text-right" style="color:red;"><?php echo $this->Html->moeda($saidas->total); ?></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-md-6">Sangrias</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda($sangrias->total); ?></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-md-6">Vendas</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda($vendas->total); ?></div>
            <div class="clearfix"></div>
            <br />
            <div class="col-xs-12 col-md-6">Saldo</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda((floatval($vendas->total) + floatval($sangrias->total) + floatval($entradas->total) + floatval($saldoInicial->total)) - floatval($saidas->total)); ?></div>
            <div class="clearfix"></div>
            <br />
            <div class="col-xs-12 col-md-6">Vendas Dinheiro</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda($vendasDinheiro->total); ?></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-md-6">Vendas Cartão</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda($vendasCartao->total); ?></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-md-6">Vendas Cheque</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda($vendasCheque->total); ?></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-md-6">Vendas Total</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda(floatval($vendasDinheiro->total) + floatval($vendasCartao->total) + floatval($vendasCheque->total)); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="col-xs-12 col-md-3"></div>
        <div class="clearfix"></div>

        <h3>Fechamento do Operador(a)</h3>
        <div class="col-xs-12 col-md-3"></div>
        <div class="col-xs-12 col-md-6">
            Troco    : ________________________________________________________________
            <br />
            Dinheiro : ________________________________________________________________
            <br />
            Cartão   : ________________________________________________________________
            <br />
            Cheque   : ________________________________________________________________
            <br />
            Sangria  : ________________________________________________________________
            <br />
            Moedas   : ________________________________________________________________
            <br />
            Total    : ________________________________________________________________
            <br />
            Saldo CX : ________________________________________________________________
            <br />
            Diferença: ________________________________________________________________ (  ) - Sobra (  ) - Falta 
            <br />
            <br />
            ________________________________________________________________
            <br />
            Ass. Operador(a)
        </div>
        <div class="col-xs-12 col-md-3"></div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-footer">
        <div class="col-xs-12 font-12 text-center-xs text-right">
            <?php echo $this->Html->link('<i class="fa fa-print"></i> Imprimir', array_merge(array_merge($this->request->query, $this->request->params['pass']), ['imprimir' => 'S']), ['class' => 'btn btn-primary']); ?>
        </div><!-- /.row -->
        <div class="clearfix"></div>
    </div>
</div>
