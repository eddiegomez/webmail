<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Requisicao;
use DB;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $dados ['janeiro'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',1)->whereYear('updated_at', date('Y'))->whereMonth('updated_at', '1')->count();
        $dados ['fevereiro'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',1)->whereYear('updated_at', date('Y'))->whereMonth('updated_at', '2')->count();
        $dados ['marco'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',1)->whereYear('updated_at', date('Y'))->whereMonth('updated_at', '3')->count();
        $dados ['abril'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',1)->whereYear('updated_at', date('Y'))->whereMonth('updated_at', '4')->count();
        $dados ['maio'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',1)->whereYear('updated_at', date('Y'))->whereMonth('updated_at', '5')->count();
        $dados ['junho'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',1)->whereYear('updated_at', date('Y'))->whereMonth('updated_at', '6')->count();
        $dados ['julho'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',1)->whereYear('updated_at', date('Y'))->whereMonth('updated_at', '7')->count();
        $dados ['agosto'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',1)->whereYear('updated_at', date('Y'))->whereMonth('updated_at', '8')->count();
        $dados ['setembro'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',1)->whereYear('updated_at', date('Y'))->whereMonth('updated_at', '9')->count();
        $dados ['outubro'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',1)->whereYear('updated_at', date('Y'))->whereMonth('updated_at', '10')->count();
        $dados ['novembro'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',1)->whereYear('updated_at', date('Y'))->whereMonth('updated_at', '11')->count();
        $dados ['dezembro'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',1)->whereYear('updated_at', date('Y'))->whereMonth('updated_at', '12')->count();

        $dados ['pjaneiro'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', '1')->count();
        $dados ['pfevereiro'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', '2')->count();
        $dados ['pmarco'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', '3')->count();
        $dados ['pabril'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', '4')->count();
        $dados ['pmaio'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', '5')->count();
        $dados ['pjunho'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', '6')->count();
        $dados ['pjulho'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', '7')->count();
        $dados ['pagosto'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', '8')->count();
        $dados ['psetembro'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', '9')->count();
        $dados ['poutubro'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', '10')->count();
        $dados ['pnovembro'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', '11')->count();
        $dados ['pdezembro'] = DB::table('requisicao')->where('tipo_requisicao_idtipo_requisicao','=',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', '12')->count();
        
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
