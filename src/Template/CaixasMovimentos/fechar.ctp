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
            <div class="col-xs-12 col-md-6">Saldo Caixa</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda((floatval($vendas->total) + floatval($entradas->total) + floatval($saldoInicial->total)) - floatval($saidas->total)); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="col-xs-12 col-md-6">Vendas Dinheiro</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda($vendasDinheiro->total); ?></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-md-6">Vendas Cartão</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda($vendasCartao->total); ?></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-md-6">Vendas Cheque</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda($vendasCheque->total); ?></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-md-6">Vendas Prazo</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda($vendasPrazo->total); ?></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-md-6">Vendas Total</div><div class="col-xs-12 col-md-6 text-right" style="color:blue;"><?php echo $this->Html->moeda(floatval($vendasDinheiro->total) + floatval($vendasCartao->total) + floatval($vendasCheque->total) + floatval($vendasPrazo->total)); ?></div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>

        <h3>Fechamento do Operador(a)</h3>
        <div class="col-xs-12 col-md-6">
            <div><div class="col-xs-2">Troco :</div><div style="border-bottom: 1px solid #000;" class="col-xs-10">&nbsp;</div></div>
            <div><div class="col-xs-2">Dinheiro :</div><div style="border-bottom: 1px solid #000;" class="col-xs-10">&nbsp;</div></div>
            <div><div class="col-xs-2">Cartão :</div><div style="border-bottom: 1px solid #000;" class="col-xs-10">&nbsp;</div></div>
            <div><div class="col-xs-2">Cheque :</div><div style="border-bottom: 1px solid #000;" class="col-xs-10">&nbsp;</div></div>
            <div><div class="col-xs-2">Prazo :</div><div style="border-bottom: 1px solid #000;" class="col-xs-10">&nbsp;</div></div>
            <div><div class="col-xs-2">Sangria :</div><div style="border-bottom: 1px solid #000;" class="col-xs-10">&nbsp;</div></div>
            <div><div class="col-xs-2">Moedas :</div><div style="border-bottom: 1px solid #000;" class="col-xs-10">&nbsp;</div></div>
            <div class="clearfix"></div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div><div class="col-xs-2">Total :</div><div style="border-bottom: 1px solid #000;" class="col-xs-10">&nbsp;</div></div>
            <div><div class="col-xs-2">Saldo CX :</div><div style="border-bottom: 1px solid #000;" class="col-xs-10">&nbsp;</div></div>
            <div><div class="col-xs-2">Diferença :</div><div style="border-bottom: 1px solid #000;" class="col-xs-7">&nbsp;</div><div class="col-xs-3 text-right">(  ) - Sobra (  ) - Falta </div></div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-12 col-md-3"></div>
        <div class="col-xs-12 col-md-6">
            <br />
            <div><div style="border-bottom: 1px solid #000;" class="col-xs-12">&nbsp;</div></div>
            <div class="clearfix"></div>
            <div class="text-center"> Ass. Operador(a) </div>
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
