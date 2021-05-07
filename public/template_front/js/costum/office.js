novo_array = [];
var aux = [];

function calcular_remocao(id, preco) {
    var qtd = document.getElementById("qtd" + id).value;
    var sub_total = preco * qtd;
    var total = document.getElementById("tot").value;
    var novo_total = total - sub_total;
    document.getElementById("tot").value = novo_total;
    document.getElementById("total").innerHTML = novo_total;
}

function filtrar_array(array) {
    novo_array = array.filter(function(el) {
        return el != null;
    });
    //window.alert(novo_array);
    return novo_array;
}

function adicionar_carrinho(id) {
    var carrinho = document.getElementById("test" + id).value;
    var carrinho_novidade = document.getElementById("Ntest" + id).value;
    if (carrinho === "false" && carrinho_novidade === "false") {
        document.getElementById(id).style.background = "#ff0000";
        // document.getElementById("N" + id).style.background = "#ff0000";
        artigos.push([id, 1]); //apagar
        document.getElementById("test" + id).value = "true";
        document.getElementById("Ntest" + id).value = "true";
    } else {
        document.getElementById(id).style.background = "#ffffff";
        //document.getElementById("N" + id).style.background = "#ffffff";
        delete artigos[artigos[0].indexOf(id)]; //apagar o index
        aux = filtrar_array(artigos);
        artigos = aux;
        document.getElementById("test" + id).value = "false";
        document.getElementById("Ntest" + id).value = "false";
    }
    document.getElementById("qtd").innerHTML = artigos.length;
    document.getElementById("qtd_value").value = artigos.length;
    $.ajax({
        url: '/test',
        type: 'POST',
        dataType: 'json',
        contentType: 'json',
        data: JSON.stringify(filtrar_array(artigos)),
        contentType: 'application/json; charset=utf-8',
    });
}

function adicionar_qtd(id, qtd, artigos) {
    aux = [];
    //window.alert('inside'+id);
    artigos.forEach(artigo => {
        if (artigo[0] == id) {
            aux.push([artigo[0], qtd]);
        } else {
            aux.push([artigo[0], artigo[1]]);
        }
    });
    //aux[0][1]=1;
    //aux[1][1]=1;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });
    $.ajax({
        url: '/testes',
        type: 'POST',
        dataType: 'json',
        contentType: 'json',
        data: JSON.stringify(aux),
        contentType: 'application/json; charset=utf-8',
    });

    return aux;
}

function goBack() {
    window.history.back()
}