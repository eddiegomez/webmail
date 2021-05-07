<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artigo;
use DB;

class carrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categorias'] = DB::table('categoria')->get();
        $ids = session()->get('idd');

        $k = [];
        
        if($ids != null)
        for ($i=0; $i < count($ids); $i++) { 
            $k[$i]=$ids[$i][0];
            $data['qtds'][$i]=$ids[$i][1];
        }
        
        $data['qtdc'] = session()->get('qtd');
        $data['artigos'] = DB::table('artigo')
        ->leftJoin('foto_artigo', 'foto_artigo.artigo_idartigo', '=', 'artigo.idartigo')
        ->leftJoin('foto', 'foto.idfoto', '=', 'foto_artigo.foto_idfoto')
        ->leftJoin('tipo_qtd', 'artigo.tipo_qtd_idtipo_qtd', '=', 'tipo_qtd.idtipo_qtd')
        ->select('artigo.*', 'foto.foto', 'tipo_qtd.tipo_qtd')
        ->whereIn('idartigo', $k)
        ->get();

        $data['total'] = 0;
        $i=0;
        foreach ($data['artigos'] as $artigo) {
            $data['total'] = $data['total'] + $artigo->v_venda*$ids[$i][1];
            $i++;
        }

        return view('cart',['data'=>$data]);
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
        /*$ids = json_decode($request->getContent());
        //$ids = [];
        session()->put('idd',$ids);  
        session()->put('qtd',count($ids));   
        return ["result" => $ids];*/
        return "ecec";
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
