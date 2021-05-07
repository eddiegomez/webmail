<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    public $timestamp = 'true';
    public $table='requisicao';
    public $primaryKey='idrequisicao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_venda','tipo_requisicao_idtipo_requisicao','utilizador_idutilizador','utilizador_users_id','utilizador_tipo_utilizador_idtipo_utilizador','utilizador_contacto_idcontacto'
    ];
}
