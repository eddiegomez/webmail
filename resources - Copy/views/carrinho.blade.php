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
	
	<div id="preloder">
		<div class="loader"></div>
	</div> 

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="./index.html" class="site-logo">
							<img src="/template_front/img/logo.jpg" style="height:50px;" alt="">
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
									<i class="flaticon-bag"></i>
									<input hidden id='qtd_value' value=0>
									<span id="qtd" value=0 >0</span>
								</div>
								<a href="#">Carrinho</a>
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

	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">

		<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title"></h4>
		</div>
		<div class="modal-body">
			<p>Some text in the modal.</p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
		</div>

	</div>
	</div>

	<!-- Product filter section -->
	<section id="featured" class="product-filter-section" style="position:relative; margin-top:50px">
		<div class="container">
		
			<div class="section-title">
				<h2>Carrinho de compras</h2>
			</div>
			<ul class="product-filter-menu">
			<div class="row">
				<div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <table
                      id="tabela_carrinho"
                      class="table table-bordered table-hover dataTable"
                      role
                      aria-describedby="example2_info"
                    >
                      <thead>
                        <tr role="row">
                          <th
                            class="sorting_asc"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-sort="ascending"
                            aria-label="Rendering engine: activate to sort column descending"
							style="width:8%"
                          >Foto</th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="Browser: activate to sort column ascending"
							style="width:50%"
                          >Artigo</th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="CSS grade: activate to sort column ascending"
							style="width:10%"
                          >Qtd</th>
						  <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="CSS grade: activate to sort column ascending"
							style="width:9%"
                          >Unitário</th>
						  <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="CSS grade: activate to sort column ascending"
							style="width:10%"
                          >Sub-total</th>
						  <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="CSS grade: activate to sort column ascending"
							style="width:12%"
                          ></th>
                        </tr>
                      </thead>
                      <tbody>
						<?php $id_row = 0;?>
						@foreach ($artigos as $artigo)
						<tr>
                          <td><img src="/imagens/artigos/{{$artigo->foto}}" alt="" class="img-circle elevation-2" style="height:55px; width: 55px; border-radius: 5rem"></td>
                          <td>{{$artigo->artigo}}</td>
						  <td><input type="number" value= "1" class="form-control" id="qtd{{$artigo->idartigo}}" onchange="calcular({{$artigo->idartigo}},{{$artigo->v_venda}})"></td>
                          <td>{{$artigo->v_venda}},00MT</td>
						  <td id="sub_total{{$artigo->idartigo}}" >{{$artigo->v_venda}},00MT</td>
						  <input type="number" hidden id="sub{{$artigo->idartigo}}" value="{{$artigo->v_venda}}">
                          <td>
                            <a >
                              <button type="submit" class="btn curved btn-success" >
                                <i class="fa fa-eye"></i>
                              </button>
							</a>
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
                      <tfoot></tfoot>
                    </table>
                  </div>
				  <div class="col-sm-1"></div>
				  <div class="col-sm-1"></div>
				  <input type="number" hidden id="tot" value="{{$total}}">
				  <div class="col-sm-10 text-right"><h3 style="display: inline">Total: </h3> <h3 style="display: inline" id="total">{{$total}}</h3><h3 style="display: inline">,00MT</h3></div>
                </div>			
			</ul>
			<div class="row">
			
			</div>
			<div class="text-center pt-5">
				 
				<a href="#">
					<button class="site-btn sb-line sb-dark">Qualquer coisa</button>
				</a>
				<input type="button" value="Back" onclick="goBack()">
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
		var artigos = <?php echo json_encode(session()->get('idd')); ?>;
		var linhas = [];
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
