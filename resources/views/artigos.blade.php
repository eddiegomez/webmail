@extends('layouts.frontOffice')

@section('content')

	<!-- Page info -->
	<div class="page-top-info" style="height:100px">
		<div class="container">
			<h4>Artigos</h4>
			<div class="site-pagination" style="display:inline">
				<a href="/">Home</a> /
				<a onclick="#">Artigos</a> 
			</div> 
		</div>
	</div>
	<!-- Page info end -->

	<!-- Product filter section -->
	<section id="featured" class="product-filter-section" style="position:relative; margin-top:50px">
		<div class="container">
			<ul class="product-filter-menu">
				@foreach ($data['categorias'] as $categoria)
					<li><a href="categ/{{$categoria->idcategoria}}">{{$categoria->categoria}}</a></li>
				@endforeach
			</ul>
			<div class="row">
				@foreach ($artigos as $artigo)
					<div class="col-lg-3 col-sm-6">
						<div class="product-item">
							<div class="pi-pic">
								<input hidden id='test{{$artigo->idartigo}}' value="false">
								<input hidden id='Ntest{{$artigo->idartigo}}' value="false">
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
					</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- Product filter section end -->
@endsection

@section('scripts')

	<script>
		var aux = [];
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