<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Artigo;
use PDF;

class DynamicPDFController extends Controller
{
    function index()
    {
        $data = $this->get_customer_data();
        return view('dynamic_pdf')->with('data', $data);
    }

    function meus_pedidos()
    {
        $data['categorias'] = DB::table('categoria')->get();

        $data['pedidos'] = DB::table('requisicao')
        ->leftJoin('tipo_requisicao', 'requisicao.tipo_requisicao_idtipo_requisicao', '=', 'tipo_requisicao.idtipo_requisicao')
        ->select('requisicao.*', 'tipo_requisicao.tipo_requisicao')
        ->where('users_id', Auth::user()->id)
        ->get(); 

        return view('meus_pedidos')->with('data', $data);
    }

    function get_customer_data()
    {
        $data['categorias'] = DB::table('categoria')->get();
        $data['ref'] = DB::table('requisicao')->latest()->first();
        $ids = session()->get('idd');
        $qtdc = session()->get('qtd');
        $data['artigos'] = DB::table('artigo')
        ->leftJoin('foto_artigo', 'foto_artigo.artigo_idartigo', '=', 'artigo.idartigo')
        ->leftJoin('foto', 'foto.idfoto', '=', 'foto_artigo.foto_idfoto')
        ->leftJoin('tipo_qtd', 'artigo.tipo_qtd_idtipo_qtd', '=', 'tipo_qtd.idtipo_qtd')
        ->select('artigo.*', 'foto.foto', 'tipo_qtd.tipo_qtd')
        ->whereIn('idartigo', $ids)
        ->get();

        $data['total'] = 0;

        foreach ($data['artigos'] as $artigo) {
            $data['total'] = $data['total'] + $artigo->v_venda;
        }
        $data['total'] = $data['total']+session()->get('delivery');

        return $data; 
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
     $data = $this->get_customer_data();
     $i=1;
     $total=0;
     $d=strtotime("+1 Week");
     $output = '<!DOCTYPE html>
     <html>
      <head>
       <title>Marie - Factura</title>
         <link rel="stylesheet" type="text/css" href="./template_front/css/bootstrap.min.css" media="screen"/>
         <link rel="stylesheet" type="text/css" href="./template_front/css/font-awesome.min.css" media="screen"/>
         <link rel="stylesheet" type="text/css" href="./template_front/css/flaticon.css" media="screen"/>
         <link rel="stylesheet" type="text/css" href="./template_front/css/style.css" media="screen"/>
       <style type="text/css">
        .box{
         width:600px;
         margin:0 auto;
        }
       </style>
      </head>
      <body>
         <br />
                <p style="display:none">'.$d=strtotime("+1 Week").'</p>
                <div class="row">
                    <div class="col-sm-8">
                        <h4>#FA00'.$data['ref'].'/20</h4><br/>
                        <img src="./template_front/img/logo.jpg" style="height:65px; position:relative;top:-15px" alt="">
                        <h4 align="left" style="position:relative;top: 0px"><strong>Marie Sex Shop E.I.</strong></h4><br/>
                        <p align="left" style="position:relative;top: -25px">Moçambique - Maputo</p>
                        <p align="left" style="position:relative;top: -40px">Av. Julius Nyerere, Nr. 42, Q. 100</p>
                        <p align="left" style="position:relative;top: -55px">Mariesexshopp@gmail.com</p>
                        <p align="left" style="position:relative;top: -70px">+258 878668868 ou +258 847416536</p>
                    </div>
                    <div class="col-sm-4" style="position:relative; top:50px; float: right">
                        <p style="float:right;position:relative;top: -60px"><strong>Data de emissão: </strong>'. date("d/m/Y") .'</p>
                        <p style="float:right;position:relative;top: -40px"><strong>Data vencimento: </strong>'. date("d/m/Y", $d).'</p>
                        <h4 style="float:right !important; font-size:18pt;position:relative;top: 40px"><strong>'. Auth::user()->name.' '.Auth::user()->apelido .'</strong></h4><br/>
                        <p style="float:right !important; position:relative;top: 60px">Moçambique - Maputo</p>
                        <p style="float:right; position:relative;top: 80px">Av. Julius Nyerere, Nr. 42, Q. 100</p>
                        <p style="float:right; position:relative;top: 100px">'.Auth::user()->email.'</p>
                        <p style="float:right; position:relative;top: 120px">'.Auth::user()->celular.'</p>
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
                             <tr style="border: 1px solid; padding:12px;">
                             <th style="border: 1px solid; padding:12px;" width="5%">#</th>
                             <th style="border: 1px solid; padding:12px;" width="50%">Artigo</th>
                             <th style="border: 1px solid; padding:12px;" width="5%">QTD</th>
                             <th style="border: 1px solid; padding:12px;" width="15%" align="right">P. Unitário</th>
                             <th style="border: 1px solid; padding:12px;" width="15%" align="right">Total Unitário</th>
                             </tr>
                        </thead>
                        <tbody>
                        ';  
                        foreach($data['artigos'] as $artigos)
                        {
                        $output .= '
                        <tr>
                        <td style="border: 1px solid; padding:12px;">'.$i.'</td>
                        <td style="border: 1px solid; padding:12px;">'.$artigos->artigo.'</td>
                        <td style="border: 1px solid; padding:12px;">'.'1'.'</td>
                        <td style="border: 1px solid; padding:12px;">'.$artigos->v_venda.',00MT </td>
                        <td style="border: 1px solid; padding:12px;">'.$artigos->v_venda.',00MT </td>
                        </tr>
                        ';
                            $i=$i+1;
                            $total=$total+$artigos->v_venda;
                        }
                        $output .= '</tbody>
                        </table>
                        <strong><h5 align="right" style="margin-top:15px">Sub-Total:'. $total.',00MT</h5></strong>';
                        if(session()->get('delivery')!=0){
                            $output .= '<h6 align="right" style="margin-top:15px">Delivery: '. session()->get('delivery').',00MT</h6>';
                        }
                        $output .='
                        <strong><h5 align="right" style="margin-top:15px">Total:'.$data['total'].',00MT</h5></strong>
                    </div>
                    <p style="float:right;position:absolute; bottom:0px">Marie Sex Shop E.I. '.date("d/m/Y").'</p>

                    </body>
                    </html>';
     return $output;
    }
}