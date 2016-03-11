cake.produtos = {};

cake.produtos.duplicidade = function (tipo) {
    $('#' + tipo).change(function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            type: "POST",
            dataType: "json",
            url: router.url + 'produtos/verifica',
            data: {
                tipo: tipo.replace('-', '_'),
                valor: $(this).val()
            },
            success: function (d) {
                if (d.cod == 999) {
                    window.location.href = router.url + 'produtos/edit/' + d.id;
                }
            }
        });
    });
}

cake.produtos.atalho = function () {
    $('#nome-atalho').removeAttr('required');
    if ($('#atalho').val() == 1) {
        $('#nome-atalho').attr('required', 'required');
    }
    $('#atalho').change(function () {
        $('#nome-atalho').removeAttr('required');
        if ($(this).val() == 1) {
            $('#nome-atalho').attr('required', 'required');
        }
    });
}

cake.produtos.calcularPorcentagem = function () {
    $('.calcular-procentagem').change(function (e) {
        e.preventDefault();
        var venda = cake.util.convertFloat($(this).closest('form').find('#venda').val());
        var compra = cake.util.convertFloat($(this).closest('form').find('#compra').val());
        var calculo = (((venda - compra) / venda) * 100).toFixed(4);
        calculo = calculo.toString().replace('.', ',');
        $(this).closest('form').find('#margem').val(calculo);
        if (venda < compra) {
            cake.msg.erro('Erro de calculo.', 'O valor da VENDA está menor que o de COMPRA.');
        }
    });
}

$(function () {
    cake.produtos.atalho()
    cake.produtos.calcularPorcentagem();
    cake.produtos.duplicidade('barra');
});