<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\artigo_requisicao;
use App\Utilizador;
use App\Requisicao;
use App\Endereco;
use App\Contacto;
use App\pedido;
use App\user;
use DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pedidos'] = DB::table('requisicao')
        ->leftJoin('tipo_requisicao', 'requisicao.tipo_requisicao_idtipo_requisicao', '=', 'tipo_requisicao.idtipo_requisicao')
        ->leftJoin('users', 'users.id', '=', 'requisicao.users_id')
        ->leftJoin('contacto', 'contacto.idcontacto', '=', 'users.contacto_idcontacto')
        ->select('requisicao.*', 'users.name', 'users.apelido','contacto.email','contacto.celular', 'tipo_requisicao.tipo_requisicao')
        ->where([['requisicao.tipo_requisicao_idtipo_requisicao' , 2],['requisicao.estado' , 1]])
        ->get(); 
        
        return $data;
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
        $data['artigos'] = DB::table('artigo_requisicao')
        ->leftJoin('artigo', 'artigo.idartigo', '=', 'artigo_requisicao.artigo_idartigo')
        ->select('artigo_requisicao.*', 'artigo.*')
        ->where('artigo_requisicao.requisicao_idrequisicao' ,$id)
        ->get();

        return $data;
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
        $resultado = DB::table('requisicao')
            ->where('idrequisicao', $id)
            ->update(['updated_at' => date('Y-m-d h:i:s'), 'tipo_requisicao_idtipo_requisicao'=>1]);

        if($resultado){
            $items = DB::table('artigo_requisicao')
                ->leftJoin('artigo', 'artigo.idartigo', '=', 'artigo_requisicao.artigo_idartigo')
                ->select('artigo_idartigo', 'qtd', 'artigo.quantidade')
                ->where('artigo_requisicao.requisicao_idrequisicao' , $id)
                ->get();
        
            foreach ($items as $item) {
                DB::table('artigo')
                ->where('idartigo', $item->artigo_idartigo)
                ->update(['updated_at' => date('Y-m-d h:i:s'), 'quantidade'=>($item->quantidade-$item->qtd)]);
            }
        }
        
        return $items;
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
