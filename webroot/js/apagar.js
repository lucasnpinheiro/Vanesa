cake.apagar = {};

cake.apagar.calcularDesconto = function () {
    if ($('#data-pagamento').val() != '') {
        var vlrd = cake.util.convertFloat($('#valor-documento').val());
        var vlrp = cake.util.convertFloat($('#valor-pagamento').val());
        var d = (vlrp - vlrd);
        $('#valor-acrescimo').val(cake.util.moedaSemMascara(d));
    }
};

$(function () {
    $('#valor-pagamento').change(function () {
        cake.apagar.calcularDesconto();
    });
    $('#tipo').change(function () {
        if ($(this).val() == 1) {
            $('#valor-pagamento').val($('#valor-documento').val());
            $('#data-pagamento').val($('#data-vencimento').val());
            cake.apagar.calcularDesconto();
        }
    });
});