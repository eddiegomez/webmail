var id;
var artigos = [];

function myFunction() {
	artigos.push("blusa");
	window.alert(artigos);
}
function goForward() {
    window.history.forward()
}
function adicionar_carrinho(id,q,artigos_session) {
	var ii = document.getElementById("test"+id).value;
	
	artigos = artigos_session;
	//window.alert(artigos_session);
	if (ii === "false") {
		document.getElementById(id).style.background = "#ff0000";
		document.getElementById("verifica").value = "true";
		artigos.push(id);
		q = q + 1;
		document.getElementById("qtd").innerHTML = q;
		ii = document.getElementById("test"+id).value = "true";
		//window.location.href = "/add/"+id;
	} else {
		document.getElementById(id).style.background = "#ffffff";
		delete artigos[artigos.indexOf(id)];
		q = q - 1;
		document.getElementById("qtd").innerHTML = q;
		ii = document.getElementById("test"+id).value = "false";
	}
	if(artigos.length==0){
		document.getElementById("verifica").value = "false";
	}
	$.ajax({
		url:'/test',
		type: 'POST',
		dataType:'json',
		contentType: 'json',
		data: JSON.stringify(artigos),
		contentType: 'application/json; charset=utf-8',
	});
}
function adicionar(id) {
	$ajax({
		url: "set_session.php",
		data: {role: "eddiee3eeeeeee"}
	});
}
function carrinho() {
	var valor = document.getElementById("verifica").value;
	if (valor === "false" ) {
    	window.alert("Adicione elementos ao carrinho");
	} else {
        var arrStr = encodeURIComponent(JSON.stringify(artigos));
		window.location.href = "/carrinho?arrays=" + arrStr;
		//window.alert(arrStr);
       // $('#carrinho').attr({ href: '/carrinho?array=' + arrStr });
	}
}
function comprar() {
	/*$.ajax({
	headers: {
    'X-CSRF-Token': csrfToken
  },
    			url: '/checkout',
			type: 'POST',
			contentType: 'application/json',
			data: JSON.stringify(artigos)
		})*/
		window.location.href = "/test";
}
function sendData() {
	$.ajax({
		url:'/test',
		type: 'POST',
		dataType:'json',
		contentType: 'json',
		data: JSON.stringify(artigos),
		contentType: 'application/json; charset=utf-8',
	});
}
function calcular(id,preco) {
	var qtd = document.getElementById("qtd"+id).value;
	var sub_total = document.getElementById("sub_total"+id).innerHTML = preco * qtd;
	var sub = document.getElementById("sub"+id).value;
	var total = document.getElementById("tot").value;
	var novo_total = total - sub + sub_total;
	document.getElementById("sub"+id).value = sub_total;
	document.getElementById("tot").value = novo_total;
	document.getElementById("total").innerHTML = novo_total;
}
