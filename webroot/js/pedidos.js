cake.pedidos = {};

cake.pedidos.find = function (id) {
    if (cake.pedidos.itens[id]) {
        return cake.pedidos.itens[id];
    } else {
        return null;
    }
}

cake.pedidos.addItem = function (id) {
    var q = $('.add-itens-produtos').length;
    var p = cake.pedidos.find(id);

    var tm = cake.util.moeda(0);
    if (p.desconto_pedido == 1 && p.promocao == 0) {
        tm = '<div class="form-group"><input class="form-control juros" data-prefix="" data-thousands="." data-decimal="," maxlength="10" type="text" onchange="cake.pedidos.calculaValor(this)"></div>';
    }
    var tp = '<div class="form-group"><input class="form-control quantidade" data-suffix="" data-thousands="." data-decimal="," data-precision="3" maxlength="12" type="text" onchange="cake.pedidos.calculaQtd(this)"></div>';

    var t = '<tr rel="' + q + '" identificacao="' + p.id + '" >\n\
                <td style="width: 27%">' + p.nome + '</td>\n\
                <td style="width: 15%" class="td-qtd">' + (p.quantidade_pedido != 1 ? 1 : tp) + '</td>\n\
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
    if (p.desconto_pedido == 1 && p.promocao == 0) {
        $('.add-itens-produtos tr[rel="' + q + '"] .juros').focus();
    }
    if (p.quantidade_pedido == 1) {
        $('.add-itens-produtos tr[rel="' + q + '"] .quantidade').focus();
    }
    cake.util.mascaras();
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
}

cake.pedidos.saveItens = function (ficha, id, quantidade, valor) {

}
cake.pedidos.save = function (ficha) {

}

$(function () {
    var $eventSelect = $("#produto-id").select2({"language": "pt-BR"});
    $eventSelect.on("select2:select", function (e) {
        cake.pedidos.addItem(e.params.data.id);
    });
});