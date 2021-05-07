<meta charset="UTF-8">
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>marie sex shop</title>
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
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Page Preloder-->
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
					<li><a href="/">Home</a></li>
					<li><a href="/#news">Novidades <span class="new">new</span></a></li>
					<li><a href="/artigos"><strong>Artigos</strong></a></li>
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
			<h4>Carrinho de compras</h4>
			<div class="site-pagination" style="display:inline">
				<a href="/">Home</a> /
				<a href="#">Carrinho</a>
			</div>
			<input type="button" class="site-btn" value="Voltar" onclick="goBack()" style="display:inline; position: relative; float:right; top:-30px">
		</div>
	</div>
	<!-- Page info end -->


	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Carrinho</h3>
						<div class="cart-table-warp">
							<table id="tabela_carrinho">
							<thead>
								<tr>
									<th class="product-th">Produto</th>
									<th class="quy-th">Quantidade</th>
									<th class="size-th">Tamanho</th>
									<th class="total-th">Preço</th>
								</tr>
							</thead>
							<tbody>
							<?php $id_row = 0;?>
							@foreach ($artigos as $artigo)
								<tr>
									<td class="product-col">
										<img src="/imagens/artigos/{{$artigo->foto}}" alt="" style="height:90px; width: 80px;">
										<div class="pc-title">
											<h4>{{$artigo->artigo}}</h4>
											<p>{{$artigo->v_venda}},00MT</p>
										</div>
									</td>
									<td class="quy-col">
										<div class="quantity">
					                        <div class="pro-qty">
												<input type="number" value="1" id="qtd{{$artigo->idartigo}}" onchange="calcular({{$artigo->idartigo}},{{$artigo->v_venda}})">
											</div>
                    					</div>
									</td>
									<td class="size-col"><h4>Size M</h4></td>
									<input type="number" hidden id="sub{{$artigo->idartigo}}" value="{{$artigo->v_venda}}">
									<td class="total-col" ><h4 id="sub_total{{$artigo->idartigo}}" style="display:inline">{{$artigo->v_venda}}</h4><h4 style="display:inline">,00MT</h4></td>
									<td>
									<?php $id_row = $id_row+1;?>
									<input hidden id='id_row{{$id_row}}' value={{$id_row}}>
										<a  onclick="remover({{$artigo->idartigo}},{{$artigo->v_venda}},{{$id_row}})">
									<button type="submit" class="btn curved btn-danger">
										<i class="fa fa-trash"></i>
									</button>
									</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<input type="number" hidden id="tot" value="{{$total}}">
							<h6>Total <span><h6 style="display: inline" id="total">{{$total}}</h6>,00MT</span></h6>
						</div>
					</div>
				</div>
				<div class="col-lg-4 card-right">
					<form class="promo-code-form">
						<input type="text" disabled placeholder="Introduzir cupão">
						<button>Submeter</button>
					</form>
					<a onclick="checkout()" class="site-btn" style="color:white">Checkout</a> 
					<a href="/artigos" class="site-btn sb-dark">Adicionar items</a>
				</div>
				<!-- Modal -->
				<div id="autenticacao" class="modal fade" id="modal_pagamento" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
							<div class="col-sm-12">
									<form method="POST" action="{{ route('login') }}">
										@csrf

										<!-- Email address -->
										<div class="form-group">

										<!-- Label -->
										<p class="text-muted">Email</p>

										<!-- Input -->
										<input type="email" name="email" id="email" style="border-radius: 25px;" class="form-control @error('email') is-invalid @enderror" placeholder="nome@exemplo.com"  value="{{ old('email') }}" required autocomplete="email" autofocus>
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror

										</div>

										<!-- Password -->
										<div class="form-group">

										<div class="row">
											<div class="col">
												
											<!-- Label -->
											<p class="text-muted">Senha</p>

											</div>
											<div class="col-auto">
											
											
											@if (Route::has('password.request'))
											<a class="form-text small text-muted" onclick="reocuperar_senha()">
												{{ __('Esqueceu-se da senha??') }}
											</a>
											@endif

											</div>
										</div> <!-- / .row -->

										<!-- Input group -->
										<div class="input-group input-group-merge">

											<!-- Input -->
											<input id="password" type="password" style="border-bottom-left-radius: 2em; border-top-left-radius: 2em;" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

												@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											<!-- Icon -->
											<div class="input-group-append">
											<span class="input-group-text" style="border-bottom-right-radius: 2em; border-top-right-radius: 2em;">
												<i class="nav-icon fa fa-chart-line"></i>
											</span>
											</div>

										</div>
										</div>

										<center>
										<!-- Submit -->
										<button class="site-btn">
										Entrar
										</button>
										</center>

										<!-- Link -->
										<div class="text-center" style="position:relative;top:10px">
										<small class="text-muted text-center" style="top:15px">
											Ainda não possui uma conta? <a onclick="registar_se()"> Registe-se </a>.
										</small>
										</div>
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal -->
				<div id="registo" class="modal fade" id="modal_pagamento" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
							<div class="col sm-12">
								<form method="POST" action="{{ route('register') }}">
									@csrf

									<div class="form-group row">
										<label for="apelido" class="col-md-3 col-form-label text-md-right">Apelido</label>

										<div class="col-md-9">
											<input id="apelido" type="text" class="form-control @error('apelido') is-invalid @enderror" name="apelido" value="{{ old('apelido') }}" required autocomplete="apelido" autofocus>

											@error('apelido')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<label for="name" class="col-md-3 col-form-label text-md-right">Nome</label>

										<div class="col-md-9">
											<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

											@error('name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<label for="email" class="col-md-3 col-form-label text-md-right">E-Mail</label>

										<div class="col-md-9">
											<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<label for="celular" class="col-md-3 col-form-label text-md-right">Celular(+258)</label>

										<div class="col-md-9">
											<input id="celular" type="number" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}" required autocomplete="celular">

											@error('celular')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<label for="password" class="col-md-3 col-form-label text-md-right">Senha</label>

										<div class="col-md-9">
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<label for="password-confirm" class="col-md-3 col-form-label text-md-right">Confirme</label>

										<div class="col-md-9">
											<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
										</div>
									</div>

									<div class="form-group row mb-0">
										<div class="col-md-6 offset-md-4">
											<button type="submit" class="site-btn">
												Registar
											</button>
										</div>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal -->
				<div id="senha" class="modal fade" id="modal_pagamento" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<div class="col-sm-12">
									<div class="card-body">
										@if (session('status'))
											<div class="alert alert-success" role="alert">
												{{ session('status') }}
											</div>
										@endif

										<form method="POST" action="{{ route('password.email') }}">
											@csrf

											<div class="form-group row">
												<label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail') }}</label>

												<div class="col-md-9">
													<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

													@error('email')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
											<center>
												<button type="submit" class="site-btn">
													{{ __('Enviar link de confirmação') }}
												</button>
											</center>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->

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



	<!--====== Javascripts & Jquery ======-->
	<script>
		var artigos = <?php echo json_encode(session()->get('idd')); ?>;
		var linhas = [];
		var qtds = [];
		for (i = 1; i <= artigos.length; i++) {
			linhas.push("id_row"+i);
		}
		
		function remover(id,preco,id_row) {
			delete artigos[artigos.indexOf(id)];
			delete linhas[linhas.indexOf("id_row"+id_row)];
			aux = filtrar_array(artigos);
			artigos = aux;
			aux = filtrar_array(linhas);
			linhas = aux;
			calcular_remocao(id,preco);
			document.getElementById("tabela_carrinho").deleteRow(document.getElementById("id_row"+id_row).value);
			reordenar(id_row);
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
		function calcular(id,preco) {
			var qtd = document.getElementById("qtd"+id).value;
			qtds.push(id,qtd);
			var sub_total = document.getElementById("sub_total"+id).innerHTML = preco * qtd;
			var sub = document.getElementById("sub"+id).value;
			var total = document.getElementById("tot").value;
			var novo_total = total - sub + sub_total;
			document.getElementById("sub"+id).value = sub_total;
			document.getElementById("tot").value = novo_total; 
			document.getElementById("total").innerHTML = novo_total;
		}
		function checkout(){
			$("#autenticacao").modal("show");
			//window.location.href = "/checkout/"+qtds;
		}
		function registar_se(){
			$("#autenticacao").modal("hide");
			$("#registo").modal("show");
		}
		function reocuperar_senha(){
			$("#autenticacao").modal("hide");
			$("#senha").modal("show");
		}
		function reordenar(id_row){
			var indice = 1;
			for (i = 0; i < linhas.length; i++) {
				document.getElementById(linhas[i]).value = indice;
				indice = indice + 1;
			}
		}
		document.getElementById("qtd").innerHTML = artigos.length;
		document.getElementById("qtd_value").value = artigos.length;
	</script>

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
