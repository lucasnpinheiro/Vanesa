cake.pedidos = {};
cake.pedidos.editQtd = false;
cake.pedidos.editDesc = false;
cake.pedidos.sequencia = 0;
cake.pedidos.find = function (id) {
    if (cake.pedidos.itens[id]) {
        return cake.pedidos.itens[id];
    } else {
        return null;
    }
}

cake.pedidos.addItem = function (id) {
    var q = cake.pedidos.sequencia;
    var p = cake.pedidos.find(id);
    if (!p) {
        alert('Código do produto informado não existe.');
        $('.produtos_barra').val('');
        $('.produtos_barra').focus();
    } else {
        var tm = '0,00%';
        if (p.desconto_pedido == 1 && p.promocao == 0) {
            tm = '<div class="form-group" style="margin: 0; padding: 0;"><input class="form-control juros input-sm" data-prefix="" data-thousands="." data-decimal="," maxlength="10" type="text" onblur="cake.pedidos.calculaValor(this)"></div>';
            cake.pedidos.editDesc = true;
        }

        var tp = 1;
        if (p.quantidade_pedido != 1) {
            tp = '1,000';
        } else {
            if (p.unidade.toLowerCase() == 'kg') {
                tp = '<div class="form-group" style="margin: 0; padding: 0;"><input class="form-control quantidade input-sm" data-suffix="" data-thousands="." data-decimal="," data-precision="3" maxlength="12" type="text" onchange="cake.pedidos.calculaQtd(this)"></div>';
            } else {
                tp = '<div class="form-group" style="margin: 0; padding: 0;"><input class="form-control numero input-sm" data-suffix="" data-thousands="." data-decimal="," data-precision="3" maxlength="12" type="text" onchange="cake.pedidos.calculaQtd(this)"></div>';
            }
            cake.pedidos.editQtd = true;
        }
        var t = '<tr rel="' + q + '" identificacao="' + p.id + '" >\n\
                <td style="width: 27%">' + p.nome + '</td>\n\
                <td style="width: 15%" class="td-qtd">' + tp + '</td>\n\
                <td style="width: 15%">' + cake.util.moeda(p.promocao > 0 ? p.promocao : p.venda) + '</td>\n\
                <td style="width: 20%" class="td-desconto">' + tm + '</td>\n\
                <td style="width: 20%" class="td-total">' + cake.util.moeda((p.promocao > 0 ? p.promocao : p.venda) * 1) + '</td>\n\
                <td style="width: 3%;margin: 0px; padding: 0px; text-align: center;">\n\
                    <a href="#" icondirection="left" class="bt-item-remover btn btn-xs ">\n\
                        <i class="fa fa-trash"></i>\n\
                    </a>\n\
                </td\n\
            </tr>';
        $('.add-itens-produtos').append(t);
        cake.pedidos.sequencia++;
        $(".produtos_barra").val('');
        $('.add-itens-produtos tr[rel="' + q + '"] .juros').enterKey(function () {
            cake.pedidos.calculaValor(this);
        })
        if (cake.pedidos.editQtd == true) {
            if (p.unidade.toLowerCase() == 'kg') {
                $('.add-itens-produtos tr[rel="' + q + '"] .quantidade').focus();
                $('.add-itens-produtos tr[rel="' + q + '"] .quantidade').enterKey(function () {
                    cake.pedidos.calculaQtd(this);
                });
                $('.add-itens-produtos tr[rel="' + q + '"] .quantidade').blur(function () {
                    if ($.trim($(this).val()) == '') {
                        alert('Informe uma quantidade');
                        return false;
                    }
                });
            } else {
                $('.add-itens-produtos tr[rel="' + q + '"] .numero').focus();
                $('.add-itens-produtos tr[rel="' + q + '"] .numero').enterKey(function () {
                    cake.pedidos.calculaQtd(this);
                });
                $('.add-itens-produtos tr[rel="' + q + '"] .numero').blur(function () {
                    if ($.trim($(this).val()) == '') {
                        alert('Informe uma quantidade');
                        return false;
                    }
                });
            }
        } else if (cake.pedidos.editDesc == true) {
            $('.add-itens-produtos tr[rel="' + q + '"] .juros').focus();
        } else {
            cake.pedidos.saveItens(q, p.id, (p.promocao > 0 ? p.promocao : p.venda), 1, (p.promocao > 0 ? p.promocao : p.venda), null, 'add');
        }
        cake.util.rotinas();
    }
}

cake.pedidos.calculaQtd = function (obj) {
    var q = cake.util.convertFloat(obj.value);
    if (q > 0) {
        var tr = $(obj).closest('tr');
        var p = cake.pedidos.find($(tr).attr('identificacao'));
        var v = p.promocao > 0 ? p.promocao : p.venda;
        if ($(tr).find('.td-desconto').find('.juros').val()) {
            var d = ((cake.util.convertFloat($(tr).find('.td-desconto').find('.juros').val()) * 100) * v) / 100;
            var v = v - d;
        }
        var t = q * v;
        $(tr).find('.td-total').html(cake.util.moeda(t));
        cake.pedidos.editQtd = false;
        cake.pedidos.saveItens($(tr).attr('rel'), p.id, t, q, null, null, 'add');
    } else {
        return false;
    }
}

cake.pedidos.calculaValor = function (obj) {
    var tr = $(obj).closest('tr');
    var p = cake.pedidos.find($(tr).attr('identificacao'));
    var v = p.promocao > 0 ? p.promocao : p.venda;
    var q = 1;
    if (p.unidade.toLowerCase() == 'kg') {
        if ($(tr).find('.td-qtd').find('.quantidade').val()) {
            q = cake.util.convertFloat($(tr).find('.td-qtd').find('.quantidade').val());
        }
    } else {
        if ($(tr).find('.td-qtd').find('.numero').val()) {
            q = cake.util.convertFloat($(tr).find('.td-qtd').find('.numero').val());
        }
    }
    var d = ((cake.util.convertFloat(obj.value) * 100) * v) / 100;
    var v = v - d;
    var t = q * v;
    $(tr).find('.td-total').html(cake.util.moeda(t));
    cake.pedidos.editDesc = false;
    cake.pedidos.saveItens($(tr).attr('rel'), p.id, t, q, v, obj.value, 'desconto');
}

cake.pedidos.saveItens = function (sequencia, id, total, quantidade, valor, desconto, acao) {
    console.log($('.add-itens-produtos').height());
    $('.add-itens-produtos').closest('div').scrollTop($('.add-itens-produtos').height());
    if (cake.pedidos.editQtd == true) {
        $('.add-itens-produtos tr[rel="' + sequencia + '"] .quantidade').focus();
    } else if (cake.pedidos.editDesc == true) {
        $('.add-itens-produtos tr[rel="' + sequencia + '"] .juros').focus();
    } else {
        if ($('#ficha').val() != '') {
            $('.produtos_barra').focus();
            $.ajax({
                method: "POST",
                type: "POST",
                dataType: "json",
                data: {
                    ficha: $('#ficha').val(),
                    sequencia: sequencia,
                    produto_id: id,
                    total: total,
                    quantidade: quantidade,
                    valor: valor,
                    desconto: desconto,
                    acao: acao
                },
                url: router.url + 'pedidos/additens/',
                success: function (d) {
                    $('#valor-total').val(cake.util.moedaSemMascara(d.valor_total));
                    $('#valor-desconto').val(cake.util.moedaSemMascara(d.valor_desconto));
                    $('#valor-liquido').val(cake.util.moedaSemMascara(d.valor_liquido));
                    cake.pedidos.subTotal();
                }
            });
        } else {
            alert('Ficha não informada.');
        }
    }
}
cake.pedidos.save = function () {
    $('#ficha').focus();
    $('#ficha').change(function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            type: "POST",
            dataType: "json",
            url: router.url + 'pedidos/verifica/' + $(this).val(),
            success: function (d) {
                if (d.cod == 999) {
                    window.location.href = router.url + 'pedidos/add/' + d.id;
                }
            }
        });
    });
}
cake.pedidos.atualizaFicha = function () {
    $('#nome-cliente, #status').change(function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            type: "POST",
            dataType: "json",
            data: {
                nome_cliente: $('#nome-cliente').val(),
                status: $('#status').val(),
                ficha: $('#ficha').val()
            },
            url: router.url + 'pedidos/atualizar/' + $('#ficha').val(),
            success: function (d) {
            }
        });
    });

}

cake.pedidos.subTotal = function () {
    var d = cake.util.convertFloat($('#valor-dinheiro').val());
    var c = cake.util.convertFloat($('#valor-cheque').val());
    var a = cake.util.convertFloat($('#valor-cartao').val());
    var p = cake.util.convertFloat($('#valor-prazo').val());
    var l = cake.util.convertFloat($('#valor-liquido').val());
    var t = (d + c + a + p);
    $('.informe-funcionario').hide();
    $('.informe-funcionario').find(':input').removeAttr('required');
    if (p > 0) {
        $('.informe-funcionario').show();
        $('.informe-funcionario').find(':input').attr('required', 'required');
    }
    $('#valor-recebe').val(cake.util.moedaSemMascara(t));
    $('#valor-troco').val('');
    if (t > l) {
        $('#valor-troco').val(cake.util.moedaSemMascara(t - l));
    }
}

$(function () {

    if ($('#MyModal2').length > 0) {
        $('#MyModal2').modal({
            keyboard: false
        })
        $('#MyModal2').modal('show');
        $('#MyModal2').on('hidden.bs.modal', function (e) {

            if ($('.caixa_diario_operador').val() == '') {
                $('#MyModal2').modal('show');
            }
        });
    }

    $(".produtos_barra").addClass('noTab');
    var $eventSelect = $("#produto-id").select2({"language": "pt-BR"});
    $eventSelect.on("select2:select", function (e) {
        cake.pedidos.addItem(e.params.data.id);
        console.log(e);
        $eventSelect.val('').trigger("change");
    });
    $(".produtos_barra").change(function (e) {
        cake.pedidos.addItem($(this).val());
        //e.stopPropagation();
        //$(this).focus()
    });
    $('.produto-atalho').click(function (e) {
        e.preventDefault();
        cake.pedidos.addItem($(this).attr('rel'));
    });

    cake.pedidos.atualizaFicha();
    cake.pedidos.save();
    cake.util.rotinas();

    $('.add-itens-produtos').find('tr').each(function () {
        cake.pedidos.sequencia = parseInt($(this).attr('rel')) + 1;
    });
    $('.bt-item-remover').click(function (e) {
        e.preventDefault();
        cake.pedidos.saveItens($(this).closest('tr').attr('rel'), $(this).closest('tr').attr('rel'), null, null, null, null, 'remove');
        $(this).closest('tr').remove();
    });


    $('#valor-dinheiro, #valor-cheque, #valor-cartao, #valor-prazo').change(function (e) {
        e.preventDefault();
        cake.pedidos.subTotal();
    });
    $('#novo-pedido').click(function (e) {
        e.preventDefault();
        window.location.href = router.url + 'pedidos/add/';
    });

    $('#cancelar-pedido').click(function (e) {
        e.preventDefault();
        if ($('#ficha').val() != '') {
            if (confirm('Confirma o cancelamento do pedido')) {
                window.location.href = router.url + 'pedidos/cancelar/' + $('#ficha').val();
            }
        } else {
            alert('Ficha não informada');
        }
    });
    $('#finalizar-pedido').click(function (e) {
        e.preventDefault();
        if ($('#ficha').val() != '') {
            var l = cake.util.convertFloat($('#valor-liquido').val());
            var r = cake.util.convertFloat($('#valor-recebe').val());
            if (l <= r) {
                var p = cake.util.convertFloat($('#valor-prazo').val());
                if (p > 0) {
                    if ($('#funcionario-id').val() > 0) {
                        $('#novo-pedidos').attr('action', router.url + 'pedidos/finalizar/' + $('#ficha').val());
                        $('#novo-pedidos').removeAttr('onsubmit');
                        $('#novo-pedidos').submit();
                    } else {
                        alert('Informe um funcionario.');
                    }
                } else {
                    $('#novo-pedidos').attr('action', router.url + 'pedidos/finalizar/' + $('#ficha').val());
                    $('#novo-pedidos').removeAttr('onsubmit');
                    $('#novo-pedidos').submit();
                }
                /*$.ajax({
                 method: "POST",
                 type: "POST",
                 dataType: "json",
                 data: {
                 valor_liquido: cake.util.convertFloat($('#valor-liquido').val()),
                 valor_recebe: cake.util.convertFloat($('#valor-recebe').val()),
                 valor_dinheiro: cake.util.convertFloat($('#valor-dinheiro').val()),
                 valor_cheque: cake.util.convertFloat($('#valor-cheque').val()),
                 valor_cartao: cake.util.convertFloat($('#valor-cartao').val()),
                 valor_recebe: cake.util.convertFloat($('#valor-recebe').val()),
                 valor_troco: cake.util.convertFloat($('#valor-troco').val()),
                 valor_total: cake.util.convertFloat($('#valor-total').val())
                 },
                 url: router.url + 'pedidos/finalizar/' + $('#ficha').val(),
                 success: function (d) {
                 window.location.href = router.url + 'pedidos/add/';
                 }
                 });*/
            } else {
                alert('Verificar o valor recebido.');
            }
        } else {
            alert('Ficha não informada');
        }
    });
});