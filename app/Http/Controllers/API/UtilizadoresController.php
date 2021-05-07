<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utilizador;
use App\Endereco;
use App\Contacto;
use DB;
use App\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UtilizadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = DB::table('users')
        ->leftJoin('tipo_utilizador','tipo_utilizador.idtipo_utilizador','=','users.tipo_utilizador_idtipo_utilizador')
        ->leftJoin('contacto','contacto.idcontacto','=','users.contacto_idcontacto')
        ->leftJoin('endereco','endereco.idendereco','=','users.endereco_idendereco')
        ->select('users.*','tipo_utilizador.tipo_utilizador','contacto.celular','endereco.provincia','endereco.bairro','endereco.avenida','endereco.numero','endereco.quarteirao')
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
        $this->validate($request, [
            'name' => 'string|max:191',
            'apelido' => 'required|string',
            'cell' => 'required|number',
            'type' => 'required|string',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6',
            'password_confirm' => 'required|string|min:6'
        ]);

        $contacto = Contacto::create([
            'celular' => $request['cell'],
            'email' => $request['email'],
        ]);

        $endereco = Endereco::create([
            'provincia' => $request['provincia'],
            'avenida' => $request['avenida'],
            'quarteirao' => $request['quarteirao'],
            'numero' => $request['numero'],
            'bairro' => $request['bairro']
        ]);

        return  User::create([	
            'name' => $request['name'],
            'apelido' => $request['apelido'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'contacto_idcontacto' => $contacto->idcontacto,
            'tipo_utilizador_idtipo_utilizador' => $request['type'],
            'endereco_idendereco' => $endereco->idendereco,
        ]);
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
        $this->validate($request, [
            'name' => 'string|max:191',
            'apelido' => 'required|string',
            'cell' => 'required',
            'type' => 'required|string',
            'email' => 'required|string|email|max:191',
            'password' => 'required|string|min:6',
            'provincia' => 'required|string'
        ]);
       
        $user = User::FindOrFail($id);

        $data['endereco'] = DB::table('endereco')
                ->where('idendereco', $user->endereco_idendereco)
                ->update(['provincia' => $request->provincia,
                        'bairro' => $request->bairro,
                        'avenida' => $request->bairro,
                        'quarteirao' => $request->quarteirao,
                        'numero' => $request->numero]);
        
        $data['contacto'] = DB::table('contacto')
                ->where('idcontacto', $user->contacto_idcontacto)
                ->update(['email' => $request->email,
                        'celular' => $request->cell]);
                        
        $data['user'] = $user->update(['name' => $request->name,'apelido' => $request->apelido,'type'=> $request->type, 'password'=> Hash::make($request['password'])]);

        return $data;
    }
    
    public function unlockUser($id)
    {
        $user = DB::table('users')
        ->where('id', $id)
        ->update(['estado' => 1]);
        return $user;
    }

    public function lockUser($id)
    {
        $user = DB::table('users')
        ->where('id', $id)
        ->update(['estado' => 0]);
        return $user;
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
