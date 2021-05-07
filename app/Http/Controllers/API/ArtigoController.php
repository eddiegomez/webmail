<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\foto_artigo;
use App\Artigo;
use App\Foto;
use DB;

class ArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados['artigos'] = DB::table('artigo')
        ->leftJoin('foto_artigo', 'foto_artigo.artigo_idartigo', '=', 'artigo.idartigo')
        ->leftJoin('foto', 'foto.idfoto', '=', 'foto_artigo.foto_idfoto')
        ->leftJoin('tipo_qtd', 'artigo.tipo_qtd_idtipo_qtd', '=', 'tipo_qtd.idtipo_qtd')
        ->select('artigo.*', 'foto.foto', 'tipo_qtd.tipo_qtd')
        ->orderBy('artigo.created_at', 'desc')
        ->get();

        return $dados;
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
        $this->validate($request, [
            'nome' => 'required|string',
            'quantidade' => 'required|number',
            'compra' => 'required|number',
            'venda' => 'required|number',
            'categoria' => 'required|string',
            'photo' => 'required',
        ]);

        $artigo = artigo::create([
            'artigo' => $request['nome'],
            'quantidade' => $request['quantidade'],
            'descricao' => $request['descricao'],
            'estado' => $request['estado'],
            'v_compra' => $request['compra'],
            'v_venda' => $request['venda'],
            'categoria_idcategoria' => $request['categoria'],
            'tipo_qtd_idtipo_qtd' => 1
        ]);

        if($request->photo){
            $photo = time().'.'.explode('/', explode(':', substr($request->photo, 0, strpos ($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path('/imagens/artigos/').$photo);
        }
        
        $foto =  foto::create([
            'foto' => $photo
        ]);

        return foto_artigo::create([
            'artigo_idartigo' => $artigo->idartigo,
            'foto_idfoto' => $foto->idfoto
        ]);
        /*$fotos = session()->get('fotos');
        return "ecccedsws";*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados['artigo'] = DB::table('artigo')
        ->leftJoin('foto_artigo', 'foto_artigo.artigo_idartigo', '=', 'artigo.idartigo')
        ->leftJoin('foto', 'foto.idfoto', '=', 'foto_artigo.foto_idfoto')
        ->leftJoin('tipo_qtd', 'artigo.tipo_qtd_idtipo_qtd', '=', 'tipo_qtd.idtipo_qtd')
        ->select('artigo.*', 'foto.foto', 'tipo_qtd.tipo_qtd')
        ->where('artigo.idartigo','=',$id)
        ->first();

        return $dados;
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
        $artigo = DB::table('artigo')
        ->where('idartigo', $id)
        ->update(['artigo' => $request['nome'],
        'quantidade' => $request['quantidade'],
        'descricao' => $request['descricao'],
        'estado' => $request['estado'],
        'v_compra' => $request['compra'],
        'v_venda' => $request['venda'],
        'categoria_idcategoria' => $request['categoria']]);
        return $artigo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artigo = Artigo::findOrFail($id);
        $photo = Artigo::findOrFail($id);

        $artigo->delete();
    }
}
