<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilizador extends Model
{
    public $timestamp = 'true';
    public $table='utilizador';
    public $primaryKey='idutilizador';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id','tipo_utilizador_idtipo_utilizador','contacto_idcontacto'
    ];
}
