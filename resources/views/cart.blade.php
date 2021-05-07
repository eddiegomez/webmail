@extends('layouts.frontOffice')

@section('content')
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
							@if(count($data['artigos'])!=0)
							<thead>
								<tr>
									<th class="product-th">Produto</th>
									<th class="quy-th">Quantidade</th>
									<th class="size-th">Tamanho</th>
									<th class="total-th">Sub-total</th>
								</tr>
							</thead>
							<tbody>
							<?php $id_row = 0;?>
							@foreach ($data['artigos'] as $artigo)
								<tr>
									<td class="product-col">
										<img src="/imagens/artigos/{{$artigo->foto}}" alt="" style="height:90px; width: 80px;">
										<div class="pc-title">
											<h4 class="p-stock">{{$artigo->artigo}} <span>(stock: {{$artigo->quantidade}})</span></h4>
											<p>{{$artigo->v_venda}},00MT</p>
										</div>
									</td>
									<td class="quy-col">
										<div class="quantity">
					                        <div class="pro-qty">
												<input type="number" min=1 max="{{$artigo->quantidade}}" value="{{$data['qtds'][$id_row]}}" id="qtd{{$artigo->idartigo}}" onchange="calcular({{$artigo->idartigo}},{{$artigo->v_venda}})">
											</div>
                    					</div>
									</td>
									<td class="size-col"><h4>Size M</h4></td>
									<input type="number" hidden id="sub{{$artigo->idartigo}}" value="{{$artigo->v_venda}}">
									<input type="number" hidden id="disponivel{{$artigo->idartigo}}" value="{{$artigo->quantidade}}">
									<td class="total-col" ><h4 id="sub_total{{$artigo->idartigo}}" style="display:inline">{{$artigo->v_venda*$data['qtds'][$id_row]}}</h4><h4 style="display:inline">,00MT</h4></td>
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
								@else
								<div class="row">
									<div class="col-md-12">
										<center>
											<img src="/imagens/carrinho-vazio.png" style="width:200px"/>
											<h5><strong hidden style="color:rgb(120,120,120)">Ainda sem nenhuma encomenda ou compra</strong></h5>
											<a href="/artigos"><button class="site-btn sb-dark" style="margin-top:10px">Adicionar ao carinho</button></a>
										</center>
									</div>
								</div>
								@endif
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<input type="number" hidden id="tot" value="{{$data['total']}}">
							@if(count($data['artigos'])!=0)
							<h6>Total <span><h6 style="display: inline" id="total">{{$data['total']}}</h6>,00MT</span></h6>
							@endif
						</div>
					</div>
				</div>
				<div class="col-lg-4 card-right">
					<form class="promo-code-form">
						<input type="text" disabled placeholder="Introduzir cupão">
						<button>Submeter</button>
					</form>
					@if(!isset(Auth::user()->email))
						<a onclick="auth()" class="site-btn" style="color:white">Checkout</a> 
					@else
						<a onclick="checkout()" class="site-btn" style="color:white">Checkout</a> 
					@endif
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

@endsection

@section('scripts')
	<!--====== Javascripts & Jquery ======-->
	<script>
		var artigos = <?php echo json_encode(session()->get('idd')); ?>;
		//artigos[0][1]=1;
		//artigos[1][1]=1;
		//window.alert(artigos);
		var linhas = [];
		var qtds = [];
		for (i = 1; i <= artigos.length; i++) {
			linhas.push("id_row"+i);
		}
		
		function remover(id,preco,id_row) {
			//delete artigos[artigos.indexOf(id)];
			delete artigos[artigos[0].indexOf(id)];//apagaar
			//window.alert(artigos);
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
			var qtd_disponivel = document.getElementById("disponivel"+id).value;
			if(qtd >=1 && qtd <= qtd_disponivel){
				artigos = <?php echo json_encode(session()->get('idd')); ?>;
				adicionar_qtd(id,qtd,artigos); 
				var sub_total = document.getElementById("sub_total"+id).innerHTML = preco * qtd;
				var sub = document.getElementById("sub"+id).value;
				var total = document.getElementById("tot").value;
				var novo_total = total - sub + sub_total;
				document.getElementById("sub"+id).value = sub_total;
				document.getElementById("tot").value = novo_total;
				document.getElementById("total").innerHTML = novo_total;
			}
		}
		function auth(){
			$("#autenticacao").modal("show");
			//window.location.href = "/checkout/"+qtds;
		}
		function checkout(){
			window.location.href = "/checkout/"+qtds;
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
			if(linhas[i] != null){
				for (i = 0; i < linhas.length; i++) {
					document.getElementById(linhas[i]).value = indice;
					indice = indice + 1;
				}
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
@endsection