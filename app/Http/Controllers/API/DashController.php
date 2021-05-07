<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Requisicao;
use App\Artigo_requisicao;
use App\Artigo;
use App\User;
use DB;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encomendas = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',2)->get();
        $vendas = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',1)->sum('total_venda');
        $total_vendas = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',1)->get();
        $utilizadores = user::All();
        $artigos = artigo::All();

        $top_saled_id = DB::table('artigo_requisicao')
            ->leftJoin('artigo', 'artigo.idartigo', '=', 'artigo_requisicao.artigo_idartigo')
            ->select(DB::raw('sum(qtd) as count, artigo_idartigo'))
            ->groupBy('artigo_idartigo')
            ->limit(7)
            ->get();

        $ids=[];
        $i = 0;

        foreach ($top_saled_id as $top) {
            $ids[$i] = $top_saled_id[$i]->artigo_idartigo;
            $i++;
        }

        $top_saled = DB::table('artigo')
            ->leftJoin('foto_artigo', 'foto_artigo.artigo_idartigo', '=', 'artigo.idartigo')
            ->leftJoin('foto', 'foto.idfoto', '=', 'foto_artigo.foto_idfoto')
            ->select('artigo.*','foto.foto')
            ->whereIN('idartigo',$ids)
            ->get();
        
        $nr = [
            'encomendas'=> $encomendas->count(),
            'vendas'=> $vendas,
            'total_vendas'=> $total_vendas->count(),
            'artigos'=> $artigos->count(),
            'utilizadores'=> $utilizadores->count(),
            'top_saled' => $top_saled,
            'quantidades' => $top_saled_id,
        ];
        return $nr;
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
        //
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
