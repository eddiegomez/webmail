<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\artigo_requisicao;
use App\Utilizador;
use App\Requisicao;
use App\Endereco;
use App\Contacto;
use App\pedido;
use DB;

class pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $endereco = DB::table('endereco')->where('idendereco', Auth::user()->endereco_idendereco)->first();
        $contacto = DB::table('contacto')->where('idcontacto', Auth::user()->contacto_idcontacto)->first();
        
        $encomenda = requisicao::create([
            'total_venda' => $request['total'],
            'delivery' => $request['delivery'],
            'tipo_requisicao_idtipo_requisicao' => 2,
            'endereco_idendereco_entrega' => $endereco->idendereco, 
            'users_id' => Auth::user()->id
        ]);

        $ids = session()->get('idd');
        $i=0;
        $ks = [];
        $qtds = [];
        
        for ($i=0; $i < count($ids); $i++) { 
            $ks[$i]=$ids[$i][0];
            $qtds[$i]=$ids[$i][1];
        }
        
        if($encomenda){
            $i=0;
            foreach ($ks as $k) {
                $artigo_requisicao[$i] = artigo_requisicao::create([
                    'artigo_idartigo' => $k,
                    'qtd' => $qtds[$i],
                    'requisicao_idrequisicao' => $encomenda->idrequisicao
                ]);
                $i++;
            }

            /*Mail::send('mail.corpo', ['ref' => $encomenda->idencomenda], function($m){
                $m->from('mariesexshopp@gmail.com', 'MARIE SEX SHOP');
                $m->subject('Confirmação de encomenda');
                $m->to(Auth::user()->email);
            });*/
            // remove all session variables
            session_unset(); 
            return redirect(url('/dynamic_pdf/'.$encomenda->idrequisicao)); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
