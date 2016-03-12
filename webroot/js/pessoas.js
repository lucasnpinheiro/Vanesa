cake.produtos = {};

cake.produtos.duplicidade = function (tipo) {
    $('#' + tipo).change(function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            type: "POST",
            dataType: "json",
            url: router.url + cake.util.string.underscore(router.params.controller) + '/verifica',
            data: {
                tipo: tipo.replace('-', '_'),
                valor: $(this).val()
            },
            success: function (d) {
                if (d.cod == 999) {
                    window.location.href = router.url + cake.util.string.underscore(router.params.controller) + '/edit/' + d.id;
                }
            }
        });
    });
}

$(function () {
    cake.produtos.duplicidade('cnpj');
});