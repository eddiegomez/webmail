@extends('layouts.frontOffice')

@section('content')

<center>
<div class="col-sm-8" style="position:relative; margin-top:20px">
	<div class="container">
		@component('alerts/alertSuccess')
			Guarde sempre este documento como comprovativo para a operação por si executada.
		@endcomponent
	</div>
</div>
</center>	
    <div class="container" style="border-style: solid;border-radius: 25px;padding-top: 30px;">
        <div class="col-sm-11" style="">
            <div class="row">
                <div class="col-md-7" align="right">
                    
                </div>
                <div class="col-md-5" align="right">
                    <a href="{{ url('dynamic_pdf/pdf/'.$data['requisicao']->idrequisicao)  }}" target="_blank" class="btn btn-danger">Converter para PDF</a>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-8">
                    <h4>#FA000{{$data['requisicao']->idrequisicao}}/20</h4><br/>
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
                        <th width="15%" align="right">Total Unitário</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; $total=0; $j=0;?>
                        @foreach($data['artigos'] as $artigo)
                        <tr> 
                        <td>{{$i}}</td>
                        <td>{{$artigo->artigo}}</td>
                        <td>{{$data['quantidades'][$j]}}</td>
                        <td align="right">{{$artigo->v_venda}},00MT</td>
                        <td align="right">{{$artigo->v_venda*$data['quantidades'][$j]}},00MT</td>
                        </tr>
                        <?php $i=$i+1; $j++; ?> 
                        <?php $total=$total+$artigo->v_venda ?>
                        @endforeach
                    </tbody>
                </table>
                <strong><h5 align="right" style="margin-top:15px">Sub-Total: {{$data['requisicao']->total_venda-$data['requisicao']->delivery}},00MT</h5></strong>
                @if($data['requisicao']->delivery!=0)
                    <h6 align="right"style="margin-top:15px">Delivery: {{$data['requisicao']->delivery}},00MT</h6>
                @endif
                <strong><h5 align="right" style="margin-top:15px">Total: {{$data['requisicao']->total_venda}},00MT</h5></strong>
            </div>
            <p style="float:right; margin-top:65px">Documento processado por computador: <?php echo date("d/m/Y")?></p>
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
 </body>
</html>