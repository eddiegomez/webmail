<!DOCTYPE html>
<html>
 <head>
  <title>Marie - Factura</title>
  <link rel="stylesheet" href="/template_front/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/template_front/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="/template_front/css/flaticon.css"/>
	<link rel="stylesheet" href="/template_front/css/slicknav.min.css"/>
	<link rel="stylesheet" href="/template_front/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="/template_front/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="/template_front/css/animate.css"/>
	<link rel="stylesheet" href="/template_front/css/style.css"/>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
  </style>
 </head>
 <body>
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
                                                <li>
                                                    <a class="nav-link" href="/">
                                                        <p>
                                                            Minhas compras
                                                        </p>
                                                    </a>
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
							
						</ul>
					</li>
					<li><a href="#">BLOG</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->    

    <br />
	<div class="col-sm-9"></div>
	<center>
		<div class="col-sm-3">
			@component('alerts/alertSuccess')
				Operação efectuada com sucesso.
			@endcomponent
		</div>
	</center>
	<!--<div class="container">
		<div class="col-lg-12">
			<div class="cart-table">
				<h3>Minhas encomendas</h3>
				<div class="cart-table-warp">
					<table id="tabela_carrinho">
					<thead>
						<tr>
							<th class="product-th">REF</th>
							<th class="product-th">Tipo</th>
							<th class="size-th">Total</th>
							<th class="total-th">Delivery</th>
							<th class="total-th">Data de emissão</th>
							<th class="total-th">Validade</th>
						</tr>
					</thead>
					<tbody>
					<?php $id_row = 0;?>
					@foreach($dados['artigos'] as $artigo)
						<tr>
							<td class="product-col">
								<img src="/imagens/artigos/d" alt="" style="height:90px; width: 80px;">
								<div class="pc-title">
									<h4>edded</h4>
									<p> ,00MT</p>
								</div>
							</td>
							
							<td class="size-col"><h4>Size M</h4></td>
							<td class="total-col" ><h4  style="display:inline">123</h4><h4 style="display:inline">,00MT</h4></td>
							<td>
								<a  onclick=" ">
									<button type="submit" class="btn curved btn-warning" style="color: white">
										<i class="fa fa-trash"></i>
									</button>
								</a>
								<a type="button" data-toggle="modal" data-target="#detalhes">
									<button type="button" class="btn curved" style="color: white;background-color: #f51167">
										<i class="fa fa-eye"></i>
									</button>
								</a>
								<a target="_blank" href="{{ url('dynamic_pdf/pdf') }}">
									<button type="submit" class="btn curved" style="color: white;background-color: #f51167">
										<i class="fa fa-file"></i>
									</button>
								</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				</div>
				<div class="total-cost">
					<h6>Total <span><h6 style="display: inline" id="total">e</h6>,00MT</span></h6>
				</div>
			</div>
			<div id="detalhes" class="modal fade" id="modal_pagamento" role="dialog">
				<div class="modal-dialog modal-sm modal-dialog-centered">
					
					<div class="modal-content">
						<div class="modal-header">
							<center>
							<form action="/pagamento" method="POST"> 
							@csrf
								<h6>Total a pagar: <strong>cdd00MT</strong></h6>
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
		</div>
	</div>-->
    <div class="container" style="border-style: solid;border-radius: 25px;padding-top: 30px;">
        <div class="col-sm-11" style="">
            <div class="row">
                <div class="col-md-7" align="right">
                </div>
                <div class="col-md-5" align="right">
                    <a href="{{ url('dynamic_pdf/pdf') }}" target="_blank" class="btn btn-danger">Converter para PDF</a>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-8">
                    <h4>#FA0001/20</h4><br/>
                    <img src="/template_front/img/logo.jpg" style="height:65px; position:relative;top:-15px" alt="">
                    <h4 align="left" style="position:relative;top: 0px"><strong>Marie Sex Shop E.I.</strong></h4><br/>
                    <p align="left" style="position:relative;top: -25px">Moçambique - Maputo</p>
                    <p align="left" style="position:relative;top: -40px">Av. Julius Nyerere, Nr. 42, Q. 100</p>
                    <p align="left" style="position:relative;top: -55px">Mariesexshopp@gmail.com</p>
                    <p align="left" style="position:relative;top: -70px">+258 878668868 ou +258 847416536</p>
                </div>
                <div class="col-sm-4" style="position:relative; top:50px">
                    <p style="float:right"><strong>Data de emissão:</strong> <?php echo(date("d/m/Y"))?></p>
                    <p style="float:right;position:relative;top: -15px"><strong>Data vencimento: </strong><?php $d=strtotime("+1 Week");echo(date("d/m/Y", $d))?></p>
                    <p style="float:right !important; font-size:18pt;position:relative;top: -15px"><strong>{{Auth::user()->name}} {{Auth::user()->apelido}}</strong></p><br/>
                    <p style="float:right !important; position:relative;top: -35px">Moçambique - Maputo</p>
                    <p style="float:right; position:relative;top: -50px">Av. Julius Nyerere, Nr. 42, Q. 100</p>
                    <p style="float:right; position:relative;top: -65px">Mariesexshopp@gmail.com</p>
                    <p style="float:right; position:relative;top: -75px">+258 847416536</p>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-12" align="center" style="position: relative;top -50px">
                <h4>Artigos</h4>
                </div>
            </div>
            <br />
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th width="5%">#</th>
                        <th width="60%">Artigo</th>
                        <th width="5%">QTD</th>
                        <th width="15%" align="right">P. Unitário</th>
                        <th width="15%" align="right">Sub-total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach($dados['artigos'] as $artigo)
                        <tr> 
                        <td>{{$i}}</td>
                        <td>{{$artigo->artigo}}</td>
                        <td>1</td>
                        <td align="right">{{$artigo->v_venda}},00MT</td>
                        <td align="right">{{$artigo->v_venda}},00MT</td>
                        </tr>
                        <?php $i=$i+1 ?>
                        @endforeach
                    </tbody>
                </table>
                <strong><h5 align="right">Total: {{$dados['total']}},00MT</h5></strong>
            </div>
            <p style="float:right">Documento processado por computador: <?php echo date("d/m/Y")?></p>
        </div>
        
        </div>
    </div>

<div class="clearfix">

</div>
    <!-- Footer section -->
	<section class="footer-section" style="position:relative;margin-top:50px">
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
		
	</script>
 </body>
</html>