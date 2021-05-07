@extends('layouts.front')

@section('content')

	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="/template_front/img/bg.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>denim jackets</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
							<a href="/artigos" class="site-btn sb-line">Explorar</a>
							<a href="/artigos" class="site-btn sb-white">Adicionar ao carrinho</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>desde</span>
						<h2 style="display:inline">350</h2><h6 style="display:inline">MT</h6>
						<p>Compre já</p>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="/template_front/img/bg-2.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>denim jackets</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							<a href="#" class="site-btn sb-white">ADD TO CART</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>$29</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->


	<!-- letest product section -->
	<section id="news" class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>Novidades</h2>
			</div>
			<div class="product-slider owl-carousel">
				@foreach ($artigos as $artigo)
					<div class="product-item">
						<div class="pi-pic">
							<input hidden id='Ntest{{$artigo->idartigo}}' value="false">
							<a href="/produto/{{$artigo->idartigo}}"><img src="/imagens/artigos/{{$artigo->foto}}" alt="" style="height:350px; width: 100%"></a>
							<div class="pi-links">
								<!--<a class="add-card" id='N{{$artigo->idartigo}}' value='false' onclick="adicionar_carrinho({{$artigo->idartigo}})"><i class="flaticon-bag"></i><span>ADD </span></a>-->
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
	<!-- letest product section end -->



	<!-- Product filter section -->
	<section id="featured" class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>Artigos em Destaque</h2>
			</div>
			<ul class="product-filter-menu">
				@foreach ($categorias as $categoria)
					<li><a href="categ/{{$categoria->idcategoria}}">{{$categoria->categoria}}</a></li>
				@endforeach
			</ul>
			<div class="row">
			<?php $contador = 0;?>
			@foreach ($artigos as $artigo)
				<?php $contador = $contador+1;?>
					<div class="col-lg-3 col-sm-6" id='visivel{{$contador}}'>
						<div class="product-item">
							<div class="pi-pic">
								<input hidden id='test{{$artigo->idartigo}}' value="false">
								<a href="/produto/{{$artigo->idartigo}}"><img src="/imagens/artigos/{{$artigo->foto}}" alt="" style="height:350px; width: 100%"></a>
								<div class="pi-links">
									<a class="add-card" id='{{$artigo->idartigo}}' value='false' onclick="adicionar_carrinho({{$artigo->idartigo}})"><i class="flaticon-bag"></i><span>ADD </span></a>
									<a class="wishlist-btn" onclick="myFunction()"><i class="flaticon-heart"></i></a>
								</div>
							</div>
							<div class="pi-text">
								<h6>{{$artigo->v_venda}},00MT</h6>
								<p>{{$artigo->artigo}}</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="text-center pt-5">
				<a href="/artigos">
					<button class="site-btn sb-line sb-dark">Mostrar Mais</button>
				</a>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->

	@endsection

	@section('scripts')
	<input hidden id="contador" type="number" value={{$contador}}>
	<script>
		var aux = [];
		var artigos = <?php echo json_encode(session()->get('idd')); ?>;
		if (artigos != null) {
			for (i = 0; i < artigos.length; i++) {
				if (artigos[i] != null) {
					document.getElementById(artigos[i][0]).style.background = "#ff0000";
					document.getElementById("test"+artigos[i][0]).value = "true";
					document.getElementById("N"+artigos[i][0]).style.background = "#ff0000";
					document.getElementById("Ntest"+artigos[i][0]).value = "true";
				}
			}
		}
		for (i = 9; i <= document.getElementById("contador").value; i++) {
			document.getElementById("visivel"+i).style.display = "none";
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

	