@extends('layouts.frontOffice')

@section('content')
<div class="container" style="position:relative; top: 20px">
		<div class="col-lg-12">
			<div class="cart-table" style="margin-bottom:40px; padding-bottom:15px">
				<h3>Meus pedidos</h3>
				@if(count($data['pedidos'])!=0)
				<div class="cart-table-warp">
					<table id="tabela_carrinho">
					<thead>
						<tr>
							<th class="size-th">REF</th>
							<th class="size-th">Tipo</th>
							<th class="size-th">Total</th>
							<th class="total-th">Delivery</th>
							<th class="total-th">Data de emissão</th>
                            <th class="total-th">Hora de emissão</th>
							<th class="total-th">Operação</th>
						</tr>
					</thead>
					<tbody>
					<?php $id_row = 0;?>
					@foreach($data['pedidos'] as $pedidos)
						<tr>
							<td class="size-col"> <h4>#{{$pedidos->idrequisicao}}</h4> </td>
							<td class="size-col"><h4>{{$pedidos->tipo_requisicao}}</h4></td>
							<td class="total-col"><h4>{{$pedidos->total_venda}},00MT</h4></td>
                            <td class="total-col"><h4>{{$pedidos->delivery}},00MT</h4></td>
                            <td class="total-col"><h4><?php $d=strtotime($pedidos->created_at);echo(date("d/m/Y", $d))?></h4></td>
                            <td class="total-col"><h4><?php $d=strtotime($pedidos->created_at);echo(date("h:i:sa", $d))?></h4></td>
							<td>
								<a type="button" data-toggle="modal" data-target="#apagar" style="color: white">
									<button type="submit" class="btn curved btn-warning" style="color: white">
										<i class="fa fa-trash"></i>
									</button>
								</a>
								<a type="button" href="{{url('/dynamic_pdf/'.$pedidos->idrequisicao)}}">
									<button type="button" class="btn curved" style="color: white;background-color: #f51167">
										<i class="fa fa-eye"></i>
									</button>
								</a>
								<a target="_blank" href="{{ url('dynamic_pdf/pdf/'.$pedidos->idrequisicao) }}">
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
					
				</div>
				@else
				<div class="row">
					<div class="col-md-12">
						<center>
							<img src="/imagens/carrinho-vazio.png" style="width:200px"/>
							<h5><strong style="color:rgb(120,120,120)">Ainda sem nenhuma encomenda ou compra</strong></h5>
							<a href="/artigos"><button class="site-btn" style="margin-top:10px">Comprar agora</button></a>
						</center>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
@endsection

@section('scripts')
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
@endsection
