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
	<!-- Page Preloder
	<div id="preloder">
		<div class="loader"></div>
	</div> -->

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
					<li><a href="/">Home</a></li>
					<li><a href="#news">Novidades <span class="new">new</span></a></li>
					<li><a href="#featured" style = "color:red"><strong>Artigos</strong></a></li>
					<li><a href="#">Femininos</a>
						<ul class="sub-menu">
							<li><a href="#">Vibradores</a></li>
							<li><a href="#">Lingenries</a></li>
							<li><a href="#">Calcinhas</a></li>
							<li><a href="#">Tops</a></li>
							<li><a href="#">Acessórios</a></li>
						</ul>
					</li>
					<li><a href="#">Masculinos</a>
						<ul class="sub-menu">
							<li><a href="#">Boxers</a></li>
							<li><a href="#">Laminas</a></li>
							<li><a href="#">Acessórios</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->

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
				@foreach ($categorias as $categoria)
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
									<h6>what shoes to wear</h6>
									<span>Oct 21, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="/template_front/img/blog-thumbs/2.jpg"></div>
								<div class="lp-content">
									<h6>trends this year</h6>
									<span>Oct 21, 2018</span>
									<a href="#" class="readmore">Read More</a>
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
	<!-- Footer section end -->

	<script>
		var aux = [];
		var artigos = <?php echo json_encode(session()->get('idd')); ?>;
		if (artigos != null) {
			for (i = 0; i < artigos.length; i++) {
				if (artigos[i] != null) {
					document.getElementById(artigos[i]).style.background = "#ff0000";
					document.getElementById("test"+artigos[i]).value = "true";
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
	</body>
</html>
