<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo 'Movimento do Operador ' . $caixasDiarios->pessoa->nome . ' - Terminal: ' . $caixasDiarios->terminai->nome . ' - Data: ' . $caixasDiarios->data; ?>
    </div>
    <div class="col-xs-12">
        <h3>Totalizadores do Movimento</h3>
        <div class="table-responsive">
            <table class="table">
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
        <div style="width: 50%; float: left;">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 70%;">Saldo Inicial</td>
                            <td style="width: 30%;" class="text-right" style="color:blue;"><?php echo $this->Html->moeda($saldoInicial->total); ?></td>
                        </tr>
                        <tr>
                            <td>Entradas</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda($entradas->total); ?></td>
                        </tr>
                        <tr>
                            <td>Retiradas</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda($saidas->total); ?></td>
                        </tr>
                        <tr>
                            <td>Sangrias</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda($sangrias->total); ?></td>
                        </tr>
                        <tr>
                            <td>Vendas</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda($vendas->total); ?></td>
                        </tr>
                        <tr>
                            <td>Saldo Caixa</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda((floatval($vendas->total) + floatval($entradas->total) + floatval($saldoInicial->total)) - floatval($saidas->total)); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="width: 50%; float: left;">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Vendas Dinheiro</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda($vendasDinheiro->total); ?></td>
                        </tr>
                        <tr>
                            <td>Vendas Cartão</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda($vendasCartao->total); ?></td>
                        </tr>
                        <tr>
                            <td>Vendas Cheque</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda($vendasCheque->total); ?></td>
                        </tr>
                        <tr>
                            <td>Vendas Prazo</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda($vendasPrazo->total); ?></td>
                        </tr>
                        <tr>
                            <td>Vendas Total</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda(floatval($vendasDinheiro->total) + floatval($vendasCartao->total) + floatval($vendasCheque->total) + floatval($vendasPrazo->total)); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="float: none;" class="clearfix"></div>

        <h3>Fechamento do Operador(a)</h3>
        <div style="width: 50%; float: left;">
            <div class="table-responsive">
                <table class="table">
                    <tbody>  
                        <tr>
                            <td style="width: 30%;">Dinheiro :</td>
                            <td style="width: 70%;" class="borda_rodape"></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Cartão :</td>
                            <td style="width: 70%;" class="borda_rodape"></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Cheque :</td>
                            <td style="width: 70%;" class="borda_rodape"></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Prazo :</td>
                            <td style="width: 70%;" class="borda_rodape"></td>
                        </tr>
                        
                        <tr>
                            <td style="width: 30%;">Moedas :</td>
                            <td style="width: 70%;" class="borda_rodape"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="width: 50%; float: left;">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 30%;">Sangria :</td>
                            <td style="width: 70%;" class="borda_rodape"></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Troco :</td>
                            <td style="width: 70%;" class="borda_rodape"></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Total :</td>
                            <td style="width: 70%;" class="borda_rodape"></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;">Saldo CX :</td>
                            <td style="width: 70%;" class="borda_rodape"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="float: none;" class="clearfix"></div>
        <div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width:30%;">Diferença :</td>
                            <td style="width:40%;" class="borda_rodape"></td>
                            <td style="width:30%;">(  ) - Sobra (  ) - Falta</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-12 col-md-3"></div>
        <div class="col-xs-12 col-md-6">
            <br />
            <div><div style="border-bottom: 1px solid #000;" class="col-xs-12">&nbsp;</div></div>
            <div class="clearfix"></div>
            <div class="text-center"> Ass. Operador(a) </div>
            <div class="text-center"> Operador(a) <?php echo $caixasDiarios->pessoa->nome; ?> </div>
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
