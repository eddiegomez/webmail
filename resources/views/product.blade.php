@extends('layouts.frontOffice')

@section('content')

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Detalhes do artigo</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Artigo</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="/artigos"> &lt;&lt; Voltar aos artigos</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="/imagens/artigos/{{$artigo->foto}}" alt="">
					</div>
					<input id='test{{$artigo->idartigo}}' value="false">
					<input id='product_id' value="{{$artigo->idartigo}}">
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							<div class="pt active" data-imgbigurl="/imagens/artigos/{{$artigo->foto}}"><img src="/imagens/artigos/{{$artigo->foto}}" alt=""></div>
							<div class="pt" data-imgbigurl="/imagens/artigos/{{$artigo->foto}}"><img src="/imagens/artigos/{{$artigo->foto}}" alt=""></div>
							<div class="pt" data-imgbigurl="/imagens/artigos/{{$artigo->foto}}"><img src="/imagens/artigos/{{$artigo->foto}}" alt=""></div>
							<div class="pt" data-imgbigurl="/imagens/artigos/{{$artigo->foto}}"><img src="/imagens/artigos/{{$artigo->foto}}" alt=""></div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title">{{$artigo->artigo}}</h2>
					<h3 class="p-price">{{$artigo->v_venda}},00MT</h3>
					<h4 class="p-stock">Disponivel: <span>{{$artigo->quantidade}} UN</span></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
					<div class="fw-size-choose">
						<p>Tamanho</p>
						<div class="sc-item">
							<input type="radio" name="sc" id="xs-size">
							<label for="xs-size">32</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="s-size">
							<label for="s-size">34</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="m-size" checked="">
							<label for="m-size">36</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="l-size">
							<label for="l-size">38</label>
						</div>
						<div class="sc-item disable">
							<input type="radio" name="sc" id="xl-size" disabled>
							<label for="xl-size">40</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="xxl-size">
							<label for="xxl-size">42</label>
						</div>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">Cor</h2>
						<div class="fw-color-choose">
							@foreach($data['cor'] as $cor)
								<div class="cs-item">
									<!--<input type="radio" name="cs" id="gray-color">-->
									<label class="cs-gray" for="gray-color" style="background: {{$cor->cor}} !important;">
										<!--<span>(3)</span>-->
									</label>
								</div>
							@endforeach
						</div>
					</div>
					<div class="quantity">
						<p>Quantidade</p>
                        <div class="pro-qty"><input type="text" value="1"></div>
                    </div>
					<a id='adicionado{{$artigo->idartigo}}' value='false' onclick="adicionar_carrinho_2({{$artigo->idartigo}})" class="site-btn" style="color:white">Adicionar ao carrinho</a>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Descrição</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>{{$categoria->descricao ?? 'Sem descrição'}}</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Delivery & Devolução</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<p><strong>Devolução</strong> somente no acto da entrega.</p>
									<p>Possibilidade de pagamento no acto da entrega <br>Entrega ao domicilio <span>3 - 4 dias</span></p>
								</div>
							</div>
						</div>
					</div>
					<div class="social-sharing">
					<a href="https://instagram.com/marie_sexshop?igshid=qfa0fwcl5pp0" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="https://www.facebook.com/marieinfluencer/" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>ARTIGOS EM DESTAQUE</h2>
			</div>
			<div class="product-slider owl-carousel">
				@foreach ($data['artigos'] as $artigo)
					<div class="product-item">
						<div class="pi-pic">
							<input hidden id='test{{$artigo->idartigo}}' value="false">
							<a href="/produto/{{$artigo->idartigo}}"><img src="/imagens/artigos/{{$artigo->foto}}" alt="" style="height:350px; width: 100%"></a>
							<div class="pi-links">
								<a class="add-card" id='destaque{{$artigo->idartigo}}' value='false' href="artigo/{{$artigo->idartigo}}"><i class="flaticon-bag"></i><span>ADD </span></a>
								<a class="wishlist-btn" onclick="myFunction()"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>{{$artigo->v_venda}},00MT</h6>
							<p>{{$artigo->artigo}}</p>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->

@endsection

@section('scripts')
	<script>
		var aux = [];
		var artigos = <?php echo json_encode(session()->get('idd')); ?>;
		var product_id = document.getElementById("product_id").value;
		if (artigos != null) {
			for (i = 0; i < artigos.length; i++) {
				if (artigos[i] != null) {
					document.getElementById("destaque"+artigos[i][0]).style.background = "#ff0000";
					document.getElementById("test"+artigos[i][0]).value = "true";
				}
				if(artigos[i][0] == product_id){
					//window.alert(artigos[i][0]);
					document.getElementById('adicionado'+artigos[i][0]).style.background = "black";
					document.getElementById('adicionado'+artigos[i][0]).innerHTML = "Remover do carrinho";
				}
				//window.alert(product_id);
			}
		}
		if (artigos == null | artigos == 0){
			artigos = [];
		}
		document.getElementById("qtd_value").value = artigos.length;
		document.getElementById("qtd").innerHTML = artigos.length;
		function carrinho() {
			if(artigos.length > 0){
				window.location.href = "/carrinho";
			}else{
				window.alert("Adicione artigos ao carrinho");
			}
		}
		function adicionar_carrinho_2(id) {
			var ii = document.getElementById("test"+id).value;
			if (ii === "false") {
				document.getElementById('adicionado'+id).style.background = "black";
				document.getElementById('adicionado'+id).innerHTML = "Remover do carrinho";
				document.getElementById('test'+id).value = "true";
				artigos.push([id, 1]);
			} else {
				document.getElementById('adicionado'+id).style.background = "red";
				document.getElementById('adicionado'+id).innerHTML = "Adicionar ao carrinho";
				document.getElementById('test'+id).value = "false";
				delete artigos[artigos[0].indexOf(id)];
				aux = filtrar_array(artigos);
				artigos = aux;
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
		
	</script>

	<!--====== Javascripts & Jquery ======-->
	<script src="/template_front/js/jquery-3.2.1.min.js"></script>
	<script src="/template_front/js/bootstrap.min.js"></script>
	<script src="/template_front/js/jquery.slicknav.min.js"></script>
	<script src="/template_front/js/owl.carousel.min.js"></script>
	<script src="/template_front/js/jquery.nicescroll.min.js"></script>
	<script src="/template_front/js/jquery.zoom.min.js"></script>
	<script src="/template_front/js/jquery-ui.min.js"></script>
	<script src="/template_front/js/main.js"></script>
	<script src="/template_front/js/costum/office.js"></script>
@endsection
	</body>
</html>
