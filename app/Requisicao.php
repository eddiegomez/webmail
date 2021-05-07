<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisicao extends Model
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
        'total_venda','delivery','tipo_requisicao_idtipo_requisicao','endereco_idendereco_entrega','users_id'
    ];
}
