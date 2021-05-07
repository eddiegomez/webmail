<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Artigo;
use DB;

class chekoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids = session()->get('idd');
        $qtdc = session()->get('qtd');

        $k = [];
        
        for ($i=0; $i < count($ids); $i++) { 
            $k[$i]=$ids[$i][0];
            $data['qtds'][$i]=$ids[$i][1];
        }

        $data['artigos'] = DB::table('artigo')
        ->leftJoin('foto_artigo', 'foto_artigo.artigo_idartigo', '=', 'artigo.idartigo')
        ->leftJoin('foto', 'foto.idfoto', '=', 'foto_artigo.foto_idfoto')
        ->leftJoin('tipo_qtd', 'artigo.tipo_qtd_idtipo_qtd', '=', 'tipo_qtd.idtipo_qtd')
        ->select('artigo.*', 'foto.foto', 'tipo_qtd.tipo_qtd')
        ->whereIn('idartigo', $k)
        ->get();

        $total = 0;
        $i=0;
        foreach ($data['artigos'] as $artigo) {
            $total = $total + $artigo->v_venda*$ids[$i][1];
            $i++;;
        }
        $data['categorias'] = DB::table('categoria')->get();
        return view('checkout', ['data' => $data], ['total' => $total]);
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
