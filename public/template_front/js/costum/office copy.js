novo_array = [];
var aux = [];

function calcular_remocao(id,preco) {
	var qtd = document.getElementById("qtd"+id).value;
	var sub_total = preco * qtd;
	var total = document.getElementById("tot").value;
	var novo_total = total - sub_total;
	document.getElementById("tot").value = novo_total;
    document.getElementById("total").innerHTML = novo_total;
}

function filtrar_array(array) {
    novo_array = array.filter(function (el){
        return el != null;
    });
    return novo_array;
}

function adicionar_carrinho(id) {
    var ii = document.getElementById("test"+id).value;
    if (ii === "false") {
        document.getElementById(id).style.background = "#ff0000";
        document.getElementById("N"+id).style.background = "#ff0000";
        artigos.push(id);
        ii = document.getElementById("test"+id).value = "true";
        ii = document.getElementById("Ntest"+id).value = "true";
    } else {
        document.getElementById(id).style.background = "#ffffff";
        document.getElementById("N"+id).style.background = "#ffffff";
        delete artigos[artigos.indexOf(id)];
        aux = filtrar_array(artigos);
        artigos = aux;
        ii = document.getElementById("test"+id).value = "false";
        ii = document.getElementById("Ntest"+id).value = "false";
    }
    document.getElementById("qtd").innerHTML = artigos.length;
    document.getElementById("qtd_value").value = artigos.length;
    $.ajax({
        url:'/test',
        type: 'POST',
        dataType:'json',
        contentType: 'json',
        data: JSON.stringify(filtrar_array(artigos)),
        contentType: 'application/json; charset=utf-8',
    });
}
function adicionar_qtd(id,qtd) {
    aux=[];
    //window.alert('inside'+id);
    artigos.forEach(artigo => {
        if(artigo == id){
            aux.push([artigo,qtd]);
        }
        else{
            aux.push([artigo,1]);
        }
    });
    window.alert(aux);
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });
    $.ajax({
        url:'/testes',
        type: 'POST',
        dataType:'json',
        contentType: 'json',
        data: JSON.stringify(aux),
        contentType: 'application/json; charset=utf-8',
    });
}
function goBack() {
    window.history.back()
}