<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Requisicao;
use App\Utilizador;
use App\Endereco;
use App\Contacto;
use App\pedido;
use App\user;
use DB;

class OperacoesController extends Controller
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
        ->where('requisicao.tipo_requisicao_idtipo_requisicao' , 0)
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
        $resultado = DB::table('requisicao')
        ->where('idrequisicao', $id)
        ->update(['estado'=>0]);
    return $resultado;
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
