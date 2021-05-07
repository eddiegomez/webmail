@extends('layouts.frontOffice')

@section('content')


	<!--Page info-->
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
	<!--Page info end-->


	<!--checkout section-->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" method="POST" action="/encomendar">
					@csrf
						<div class="cf-title">Delievery</div>
						<div class="row address-inputs">
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
							<li><img src="/template_front/img/m-pesa.png" alt="" style="width:50px;height:32px"><img src="/template_front/img/paypal.png" alt="" style="width:50px;height:32px; margin-left: 10px"><img src="/template_front/img/card.png" alt="" style="height:37px; margin-left: 10px"></li>
							<li>Pagamento no acto da entrega</li>
						</ul>
						<center>
							<div class="col-sm-12" style="display:inline">
								<div class="col-sm-8">
								<a type="button" class="site-btn submit-order-btn" data-toggle="modal" data-target="#encomendar" style="color: white">Encomendar</a>
								<!-- Modal encomendar-->
									<div id="encomendar" class="modal fade" id="modal_pagamento" role="dialog">
										<div class="modal-dialog modal-sm modal-dialog-centered">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<div class="row">
													<img src="/imagens/question.png" alt="" style="width:300px;">
														<h6 style="margin-left: 33px;margin-bottom:10px;margin-top:10px">Deseja submeter a encomenda?</h6>
														<div class="col-sm-6"><a class="btn btn-primary" style="color:white" data-dismiss="modal">Cancelar</a></div>
													<div class="col-sm-6"><button class="btn btn-success" type="submit" style-="position:relative; float:right">Encomendar</button></div>
													</div>
												</div>
											</div>
										</div>
									</div>
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
										<div class="col-sm-10"><a onclick="processar()"><button class="btn btn-danger" style="padding: 0px !important; width: 100%; background-color:red; margin-top:10px; margin-bottom:10px"><img src="/template_front/img/m-pesa.png" alt="" style="width:50px;height:32px"></button> </div></a>
										<script
											src="https://www.paypal.com/sdk/js?client-id=AUdrZD_tq7e_hF43kuGcOlE0prE69aXCFJ34Rf_TcIDtHQm9wYmqjjugAK_7jVbqYOzbkPtmR2jTT2CX"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
										</script>
										<div class="col-sm-10" style="border: 3px"><div id="paypal-button-container"></div></div>

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

				<!-- Modal mpesa -->
				<div id="confirmacao" class="modal fade" id="modal_pagamento" role="dialog">
					<div class="modal-dialog modal-sm modal-dialog-centered">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<center>
									<img src="/template_front/img/icons/thank-you-png-icon-14.png" style="height:150px">
									<h6>Transação efectuada com sucesso. Enviamos o comprovativo para o seu e-mail. Gratos pela preferência!</h6>
								</center>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Carrinho</h3>
						<ul class="product-list">
							<?php $i=0;?>
							@foreach ($data['artigos'] as $artigo)
								<li>
									<div class="pl-thumb"><img src="/imagens/artigos/{{$artigo->foto}}" alt="" style="height:90px; width: 45px;"></div>
									<h6>{{$artigo->artigo}} <span >({{$data['qtds'][$i]}})</span></h6>
									<p>{{$artigo->v_venda}},00MT</p>
									<h6>{{$artigo->v_venda*$data['qtds'][$i]}},00MT</h6>
								</li>
								<?php $i++;?>
							@endforeach
						</ul>
						<ul class="price-list">
							<li>Sub-total<span style="position:relative; right:30px">{{$total}},00MT</span></li>
							<li>Delivery<span id="entrega" style="position:relative; right:0px">0,00MT</span></li>
							<li class="total">Total<span id="p_total" style="position:relative; right:30px">{{$total}},00MT</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- checkout section end -->

@endsection

@section('scripts')
	<script>
		paypal.Buttons({
			createOrder: function(data, actions) {
			// This function sets up the details of the transaction, including the amount and line item details.
			return actions.order.create({
				purchase_units: [{
				amount: {
					//value: total,
					value: '0.005',
					currency: 'MZN'
				}
				}]
			});
			},
			onApprove: function(data, actions) {
			// This function captures the funds from the transaction.
			return actions.order.capture().then(function(details) {
				// This function shows a transaction success message to your buyer.
				$("#metodo_pagamento").modal("hide");
				$("#confirmacao").modal("show");
				//alert('Transação completada com sucesso. Enviamos o comprovativo para o seu e-mail. Obrigado pela sua compra!');
			});
			}
		}).render('#paypal-button-container');
		//This function displays Smart Payment Buttons on your web page.
	</script>
	<script>
		var aux = [];
		var total=<?php echo json_encode($total); ?>;
		
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
				total=total+100;
				document.getElementById('p_total').innerHTML = total+',00MT';
				document.getElementById('entrega').innerHTML = '100,00MT';
				document.getElementById('i_total').value = total;
				document.getElementById('i_delivery').value = 100;
				document.getElementById('delivery').value='true';
			}else{
				document.getElementById('p_total').innerHTML = <?php echo json_encode($total); ?>+',00MT';
				document.getElementById('entrega').innerHTML = '0,00MT';
				document.getElementById('delivery').value='false';
				document.getElementById('i_delivery').value = 0;
				document.getElementById('i_total').value = <?php echo json_encode($total); ?>;
				total=<?php echo json_encode($total); ?>;
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
@endsection