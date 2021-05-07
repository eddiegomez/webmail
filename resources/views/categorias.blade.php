@extends('layouts.frontOffice')

@section('content')

	<!-- Page info -->
	<div class="page-top-info" style="height:50px">
		<div class="container">
			<div class="site-pagination" style="display:inline">
				<a href="/">Home</a> /
				<a href="#">Categorias</a> /
				<a href="#">{{$data['cat']->categoria ?? ''}}</a> 
			</div>
			<input type="button" class="site-btn" value="Voltar" onclick="goBack()" style="display:inline; position: relative; float:right; top:-30px">
		</div>
	</div>
	<!-- Page info end -->

	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Categorias</h2>
						<ul class="category-menu">
							@foreach ($data['categorias'] as $categoria)
								<li><a href="/categ/{{$categoria->idcategoria}}">{{$categoria->categoria}}</a></li>
							@endforeach
								<li><a href="/artigos">Todas</a></li>
						</ul>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">Classificar por</h2>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">Cor</h2>
						<div class="fw-color-choose">
							<div class="cs-item">
								<input type="radio" name="cs" id="gray-color">
								<label class="cs-gray" for="gray-color">
									<span>(3)</span>
								</label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="orange-color">
								<label class="cs-orange" for="orange-color">
									<span>(25)</span>
								</label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="yollow-color">
								<label class="cs-yollow" for="yollow-color">
									<span>(112)</span>
								</label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="green-color">
								<label class="cs-green" for="green-color">
									<span>(75)</span>
								</label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="purple-color">
								<label class="cs-purple" for="purple-color">
									<span>(9)</span>
								</label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="blue-color" checked="">
								<label class="cs-blue" for="blue-color">
									<span>(29)</span>
								</label>
							</div>
						</div>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">Tamanho</h2>
						<div class="fw-size-choose">
							<div class="sc-item">
								<input type="radio" name="sc" id="xs-size">
								<label for="xs-size">XS</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="s-size">
								<label for="s-size">S</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="m-size"  checked="">
								<label for="m-size">M</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="l-size">
								<label for="l-size">L</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="xl-size">
								<label for="xl-size">XL</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="xxl-size">
								<label for="xxl-size">XXL</label>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
						<?php $contador = 0;?>
						@foreach ($data['artigos'] as $artigo)
							
							<div class="col-lg-4 col-sm-6" id="div{{$artigo->idartigo}}">
								<div class="product-item">
									<div class="pi-pic">
										<input hidden id='Ntest{{$artigo->idartigo}}' value="false">
										<input hidden id='test{{$artigo->idartigo}}' value="false">
										<input hidden id='categoria{{$contador}}' type="number" value={{$artigo->categoria_idcategoria}}>
										<?php $contador = $contador+1;?>
										<a href="/produto/{{$artigo->idartigo}}"><img src="/imagens/artigos/{{$artigo->foto}}" alt="" style="height:350px; width: 100%"></a>
										<div class="pi-links">
											<a class="add-card" id='N{{$artigo->idartigo}}' hidden value='false' onclick="adicionar_carrinho({{$artigo->idartigo}})"><i class="flaticon-bag"></i><span>ADD </span></a>
											<a class="add-card" id='{{$artigo->idartigo}}' value='false' onclick="adicionar_carrinho({{$artigo->idartigo}})"><i class="flaticon-bag"></i><span>ADD </span></a>
											<a class="wishlist-btn" onclick="myFunction()"><i class="flaticon-heart"></i></a>
										</div>
									</div>
									<div class="pi-text">
										<h6>{{$artigo->v_venda}},00MT</h6>
										<p>{{$artigo->artigo}}</p>
									</div>
								</div>
								<?php session()->put('categoria', $artigo->categoria_idcategoria) ?>
								<?php session()->push('todos_artigos', $artigo->idartigo); ?>
							</div>
						@endforeach
					</div>
					@if(count($data['artigos'])==0)
					<div class="row">
						<div class="col-md-12" style="position:relative; top:90px;">
							<center>
								<img src="/imagens/carrinho-vazio.png" style="width:15%"/>
								<h3><strong style="color:rgb(120,120,120)">Nenhum artigo</strong></h3>
							</center>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
		<input hidden id="selecionada" type="number" value={{$data['cat']->idcategoria}}>
		<input hidden id="contador" type="number" value={{$contador}}>
	</section>
	<!-- Category section end -->
@endsection

@section('scripts')
	<script>
		var aux = <?php echo json_encode(session()->get('todos_artigos')); ?>;
		var artigos = <?php echo json_encode(session()->get('idd')); ?>;
		if (artigos != null) {
			for (i = 0; i < artigos.length; i++) {
				if (artigos[i] != null) {
					document.getElementById(artigos[i][0]).style.background = "#ff0000";
					document.getElementById("test"+artigos[i][0]).value = "true";
				}
			}
		}

		if (artigos == null | artigos == 0){
			artigos = [];
		}

		for (i = 0; i < document.getElementById("contador").value; i++) {
			if (document.getElementById("categoria"+i).value != document.getElementById("selecionada").value) {
				document.getElementById("div"+aux[i]).style.display = "none";
			}
		}
		
		function carrinho() {
			if(artigos.length > 0){
				window.location.href = "/carrinho";
			}else{
				window.alert("Adicione artigos ao carrinho");
			}
		}
		document.getElementById("qtd_value").value = artigos.length;
		document.getElementById("qtd").innerHTML = artigos.length;
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
