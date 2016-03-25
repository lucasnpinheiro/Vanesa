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
            tp = '<div class="form-group" style="margin: 0; padding: 0;"><input class="form-control quantidade input-sm" data-suffix="" data-thousands="." data-decimal="," data-precision="3" maxlength="12" type="text" onchange="cake.pedidos.calculaQtd(this)"></div>';
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
        $('.add-itens-produtos tr[rel="' + q + '"] .quantidade').enterKey(function () {
            cake.pedidos.calculaQtd(this);
        })
        $('.add-itens-produtos tr[rel="' + q + '"] .juros').enterKey(function () {
            cake.pedidos.calculaValor(this);
        })
        if (cake.pedidos.editQtd == true) {
            $('.add-itens-produtos tr[rel="' + q + '"] .quantidade').focus();
        } else if (cake.pedidos.editDesc == true) {
            $('.add-itens-produtos tr[rel="' + q + '"] .juros').focus();
        } else {
            cake.pedidos.saveItens(q, p.id, 1, (p.promocao > 0 ? p.promocao : p.venda), null, 'add');
        }
        cake.util.rotinas();
    }
}

cake.pedidos.calculaQtd = function (obj) {
    var q = cake.util.convertFloat(obj.value);
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
    cake.pedidos.saveItens($(tr).attr('rel'), p.id, q, null, null, 'add');
}

cake.pedidos.calculaValor = function (obj) {
    var tr = $(obj).closest('tr');
    var p = cake.pedidos.find($(tr).attr('identificacao'));
    var v = p.promocao > 0 ? p.promocao : p.venda;
    var q = 1;
    if ($(tr).find('.td-qtd').find('.quantidade').val()) {
        q = cake.util.convertFloat($(tr).find('.td-qtd').find('.quantidade').val());
    }
    var d = ((cake.util.convertFloat(obj.value) * 100) * v) / 100;
    var v = v - d;
    var t = q * v;
    $(tr).find('.td-total').html(cake.util.moeda(t));
    cake.pedidos.editDesc = false;
    cake.pedidos.saveItens($(tr).attr('rel'), p.id, q, v, obj.value, 'desconto');
}

cake.pedidos.saveItens = function (sequencia, id, quantidade, valor, desconto, acao) {
    console.log($('.add-itens-produtos').height());
    $('.add-itens-produtos').closest('div').scrollTop($('.add-itens-produtos').height());
    if (cake.pedidos.editQtd == true) {
        $('.add-itens-produtos tr[rel="' + sequencia + '"] .quantidade').focus();
    } else if (cake.pedidos.editDesc == true) {
        $('.add-itens-produtos tr[rel="' + sequencia + '"] .juros').focus();
    } else {
        $('.produtos_barra').focus();
        $.ajax({
            method: "POST",
            type: "POST",
            dataType: "json",
            data: {
                ficha: $('#ficha').val(),
                sequencia: sequencia,
                produto_id: id,
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
    var l = cake.util.convertFloat($('#valor-liquido').val());
    var t = (d + c + a);
    $('#valor-recebe').val(cake.util.moedaSemMascara(t));
    $('#valor-troco').val('');
    if (t > l) {
        $('#valor-troco').val(cake.util.moedaSemMascara(t - l));
    }
}

$(function () {
    $(".produtos_barra").addClass('noTab');
    var $eventSelect = $("#produto-id").select2({"language": "pt-BR"});
    $eventSelect.on("select2:select", function (e) {
        cake.pedidos.addItem(e.params.data.id);
        //e.stopPropagation();
        //$(".produtos_barra").focus()
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
        cake.pedidos.saveItens($(this).closest('tr').attr('rel'), $(this).closest('tr').attr('rel'), null, null, null, 'remove');
        $(this).closest('tr').remove();
    });


    $('#valor-dinheiro, #valor-cheque, #valor-cartao').change(function (e) {
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
                window.location.href = router.url + 'pedidos/finalizar/' + $('#ficha').val();
            } else {
                alert('Verificar o valor recebido.');
            }
        } else {
            alert('Ficha não informada');
        }
    });
});