<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>marie sex shop</title>
	<meta charset="UTF-8">
	<meta name="description" content=" marie sex shop">
	<meta name="keywords" content="marie sex shop">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="/template_front/img/logo.jpg" rel="shortcut icon"/>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="/template_front/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/template_front/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="/template_front/css/flaticon.css"/>
	<link rel="stylesheet" href="/template_front/css/slicknav.min.css"/>
	<link rel="stylesheet" href="/template_front/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="/template_front/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="/template_front/css/animate.css"/>
	<link rel="stylesheet" href="/template_front/css/style.css"/>

	
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	
	<div id="preloder">
		<div class="loader"></div>
	</div> 

	<!-- Header section -->
	<header class="header-section" style="background-color:black">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="./index.html" class="site-logo">
							<img src="/template_front/img/logo.jpg" style="height:55px;" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Search on marie sex shop ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								@if(isset(Auth::user()->email))
									<ul class="main-menu">
										<li><i class="flaticon-profile" style="color:white"></i><a style="color:white" href="#">   {{Auth::user()->email}}</a>
											<ul class="sub-menu">
												<li>
													<a class="nav-link" href="{{ route('logout') }}"
														onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
													<p>
														Terminar sessão
													</p>
													</a>
													
													<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													@csrf
													</form>
												</li>
											</ul>
										</li>
										
									</ul>
								@endif
								@if(!isset(Auth::user()->email))
									<i class="flaticon-profile" style="color:white"></i>
									<a style="color:white" href="{{ route('login') }}"><strong>Entrar</strong> ou</a>  <a style="color:white" href="{{ route('register') }}"><strong>Criar uma conta</strong></a>
								@endif
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag" style="color:white"></i>
									<input hidden id='qtd_value' value=0>
									<span id="qtd" value="0" >0</span>
								</div>
								<a style="color:white" onclick="carrinho()">Carrinho</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="#" class="active">Home</a></li>
					<li><a href="#news">Novidades <span class="new">new</span></a></li>
					<li><a href="#featured">Artigos</a></li>
					<li><a href="#">Categorias</a>
						<ul class="sub-menu">
							@foreach ($categorias as $categoria)
								<li><a href="categ/{{$categoria->idcategoria}}">{{$categoria->categoria}}</a></li>
							@endforeach
						</ul>
					</li>
					<li><a href="#">BLOG</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->

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
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							<a href="#" class="site-btn sb-white">ADD TO CART</a>
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
							<img src="/imagens/artigos/{{$artigo->foto}}" alt="" style="height:350px; width: 100%">
							<div class="pi-links">
								<a class="add-card" id='N{{$artigo->idartigo}}' value='false' onclick="adicionar_carrinho({{$artigo->idartigo}})"><i class="flaticon-bag"></i><span>ADD </span></a>
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
								<img src="/imagens/artigos/{{$artigo->foto}}" alt="" style="height:350px; width: 100%">
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

	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.html"><img src="/imagens/footer-logo.jpg" alt="" style="width: 70px"></a>
			</div>
			<div class="row">
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Sobre nós</h2>
						<p><strong style="">MARIE</strong> <strong style="color:red">S</strong><strong>ex Shop</strong> Adicionar texto aqui....</p>
						<img src="/template_front/img/cards.png" alt="">
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Artigos</h2>
						<div class="fw-latest-post-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="/template_front/img/blog-thumbs/1.jpg"></div>
								<div class="lp-content">
									<h6>O que vestir?</h6>
									<span>Setembro 21, 2020</span>
									<a href="#" class="readmore">Ler mais</a>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="/template_front/img/blog-thumbs/2.jpg"></div>
								<div class="lp-content">
									<h6>Tendências deste ano</h6>
									<span>Setembro 21, 2020</span>
									<a href="#" class="readmore">Ler mais</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Contactos</h2>
						<div class="con-info">
							<p><h4 style="color:#8f8f8f"><strong>Marie Sex Shop E.I. </strong></h4></p>
						</div>
						<div class="con-info">
							<span>Endereço:</span>
							<p>Maputo</p>
						</div>
						<div class="con-info">
							<span>Celular:</span>
							<p>+258 878668868</p>
						</div>
						<div class="con-info">
							<span>Email:</span>
							<p>marie_sex@gmail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
			<center>
				<div class="social-links">
					<a href="https://instagram.com/marie_sexshop?igshid=qfa0fwcl5pp0" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="https://www.facebook.com/marieinfluencer/" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
				</div>
			</center>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Marie Sex Shop <i class="fa fa-heart-o" aria-hidden="true"></i></p>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>
	</section>
	<input hidden id="contador" type="number" value={{$contador}}>
	<!-- Footer section end -->
	<script>
		var aux = [];
		var artigos = <?php echo json_encode(session()->get('idd')); ?>;
		if (artigos != null) {
			for (i = 0; i < artigos.length; i++) {
				if (artigos[i] != null) {
					document.getElementById(artigos[i]).style.background = "#ff0000";
					document.getElementById("test"+artigos[i]).value = "true";
					document.getElementById("N"+artigos[i]).style.background = "#ff0000";
					document.getElementById("Ntest"+artigos[i]).value = "true";
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
	</body>
</html>
