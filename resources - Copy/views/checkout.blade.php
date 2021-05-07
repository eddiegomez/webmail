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
	<style>
		.modificado{
			width: 100%;
			height: 44px;
			border: none;
			padding: 0 18px;
			background: #f0f0f0;
			border-radius: 40px;
			margin-bottom: 20px;
			font-size: 14px;
		}
	</style>

	
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
							<div class="up-item" style="position:relative;left:15px">
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
		<nav class="main-navbar" style="position:relative;top:15px">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="/" class="active">Home</a></li>
					<li><a href="/#featured">Novidades <span class="new">new</span></a></li>
					<li><a href="/artigos">Artigos</a></li>
					<li><a href="#">Categorias</a>
						<ul class="sub-menu">
							@foreach ($dados['categorias'] as $categoria)
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


	<!-- Page info -->
	<div class="page-top-info" style="height:100px">
		<div class="container">
			<h4>Carrinho de compras</h4>
			<div class="site-pagination" style="display:inline">
				<a href="/">Home</a> /
				<a onclick="carrinho()">Carrinho</a> / 
				<a onclick="#">Checkout</a> 
			</div>
			<input type="button" class="site-btn" value="Voltar ao carrinho" onclick="goBack()" style="display:inline; position: relative; float:right; top:-30px">
		</div>
	</div>
	<!-- Page info end -->


	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" method="POST" action="/encomendar">
					@csrf
						<div class="cf-title">Delievery</div>
						<div class="row address-inputs">
							<!--<div class="col-sm-3">
								<input required type="text" name="provincia" placeholder="Provincia">
							</div>
							<div class="col-sm-3">
								<input required type="text" name="cidade" placeholder="Cidade">
							</div>
							<div class="col-sm-6">
								<input required type="text" name="rua" placeholder="Avenida ou Rua">
							</div>
							<div class="col-sm-3">
								<input required type="text" name="bairro" placeholder="Bairro">
							</div>
							<div class="col-sm-2">
								<input type="number" class="modificado" name="quarteirao" placeholder="Q.">
							</div>
							<div class="col-sm-2">
								<input required type="number" class="modificado" name="casa" placeholder="Casa.">
							</div>
							<div class="col-sm-5">
								<input type="text" name="email" placeholder="Email">
								</div>	
							<div class="col-md-6">
								<input required type="number" class="modificado" name="celular1"  placeholder="Celular1">
							</div>
							<div class="col-md-6">
								<input type="number" class="modificado"  name="celular2" placeholder="Celular2">
							</div>-->
							<div class="col-md-6">
								<ul class="payment-list">
									<li><input type="checkbox" id="delivery" value="false" onchange="incluir_delivery()" style="position:relative;right:12px;top:10px;float:right"><span> Delivery (100,00MT)</span></li>
								</ul>
							</div>
							<input id="i_total" hidden type="number" name="total" value={{$total}}>
							<input id="i_delivery" hidden type="number" name="delivery" value=0>
						</div>
						
						<div class="cf-title">Métodos de pagamento</div>
						<ul class="payment-list">
							<li>Paypal<a href="#"><img src="/template_front/img/paypal.png" alt="" style="width:50px;height:32px"></a></li>
							<li>Mpesa<a href="#"><img src="/template_front/img/m-pesa.png" alt="" style="width:50px;height:32px"></a></li>
							<li>Pagamento no acto da entrega</li>
						</ul>
						<center>
							<div class="col-sm-12" style="display:inline">
								<div class="col-sm-8">
									<button class="site-btn submit-order-btn" type="submit">Encomendar</button>
								</div>
								<div class="col-sm-8" style="position:relative; top:15px">
									<a type="button" class="site-btn submit-order-btn" data-toggle="modal" data-target="#metodo_pagamento" style="color: white">Efectuar pagamento</a>
								</div>
							</div>
						</center>
						<!--<a href="/dynamic_pdf/pdf" class="site-btn submit-order-btn" target="_blank">Efectuar pagamento</a>-->
						<!--<a href="/pagamento" class="site-btn submit-order-btn">Efectuar pagamento</a>-->
					</form>
				</div>
				<!-- Modal metodo_pagamento-->
				<div id="metodo_pagamento" class="modal fade" id="modal_pagamento" role="dialog">
					<div class="modal-dialog modal-sm modal-dialog-centered">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<div class="row">
									<center> 
										<div class="col-sm-12"><h6 class="text-muted"> Selecione o método de pagamento</h6></div>
										<ul class="payment-list" style="position:relative; top:20px">
											<li><input type="radio" name="metodo_pagamento" value="paypal" id="pp" checked> Paypal  <img src="/template_front/img/paypal.png" alt="" style="width:50px;height:32px"></li>
											<li><input type="radio" name="metodo_pagamento" value="mpesa" checked> M-pesa  <img src="/template_front/img/m-pesa.png" alt="" style="width:50px;height:32px"></li>
										</ul>
										<a onclick="processar()"><button class="btn btn-success">Continuar</button></a>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal mpesa -->
				<div id="pagamento_mpesa" class="modal fade" id="modal_pagamento" role="dialog">
					<div class="modal-dialog modal-sm modal-dialog-centered">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
									<center>
									<form action="/pagamento" method="POST"> 
									@csrf
										<h6>Total a pagar: <strong>{{$total}},00MT</strong></h6>
										<div class="col-sm-12" style="position:relative; top:15px">
										<img src="/template_front/img/m-pesa.png" alt="" style="width:50px;height:32px">
											<div class="form-group">
												<label for="usr">Seu contacto (Vodacom):</label><br><input  style="display:inline" type="number" name="contacto_cliente" class="form-control" id="celular">
											</div>
										</div>
										<button class="btn btn-success" type="submit" style="position:relative; top:15px">Continuar</button>
										</form>
									</center>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Carrinho</h3>
						<ul class="product-list">
							@foreach ($dados['artigos'] as $artigo)
								<li>
									<div class="pl-thumb"><img src="/imagens/artigos/{{$artigo->foto}}" alt="" style="height:90px; width: 45px;"></div>
									<h6>{{$artigo->artigo}}</h6>
									<p>{{$artigo->v_venda}},00MT</p>
								</li>
							@endforeach
						</ul>
						<ul class="price-list">
							<li>Sub-total<span style="position:relative; right:40px">{{$total}},00MT</span></li>
							<li class="total">Total<span id="p_total" style="position:relative; right:40px">{{$total}},00MT</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- checkout section end -->

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
		var total=0;
		var artigos = <?php echo json_encode(session()->get('idd')); ?>;
		
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
		function incluir_delivery(){
			if(document.getElementById('delivery').value === 'false'){
				total=<?php echo json_encode($total); ?>+100;
				document.getElementById('p_total').innerHTML = total+',00MT';
				document.getElementById('i_total').value = total;
				document.getElementById('i_delivery').value = 100;
				document.getElementById('delivery').value='true';
			}else{
				document.getElementById('p_total').innerHTML = <?php echo json_encode($total); ?>+',00MT';
				document.getElementById('delivery').value='false';
				document.getElementById('i_delivery').value = 0;
				document.getElementById('i_total').value = <?php echo json_encode($total); ?>;
			}
		}
		function processar(){
			$("#metodo_pagamento").modal("hide");
			$("#pagamento_mpesa").modal("show");
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
