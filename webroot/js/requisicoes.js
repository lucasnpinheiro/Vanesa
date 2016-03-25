cake.requisicoes = {};

cake.requisicoes.findProduto = function (id) {
    $.ajax({
        method: "GET",
        type: "GET",
        dataType: "json",
        url: router.url + 'produtos/view/' + id,
        success: function (d) {
            $('.produto-nome').html(d.produto.nome);
            $('.produto-estoque').html(d.produto.estoque_atual);
            $('.produto-valor-venda').html(cake.util.moeda(d.produto.venda));
            console.log(d);
        }
    });
}
$(function () {
    var $eventSelect = $("#produto-id").select2({"language": "pt-BR"});
    $eventSelect.on("select2:select", function (e) {
        cake.requisicoes.findProduto(e.params.data.id);
    });
    $('#produto').change(function (e) {
        e.preventDefault();
        cake.requisicoes.findProduto($(this).val());
    });
});