<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    public $timestamp = 'true';
    public $table='artigo';
    public $primaryKey='idartigo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'artigo', 'quantidade', 'descricao', 'estado', 'genero', 'v_compra', 'v_venda', 'categoria_idcategoria', 'tipo_qtd_idtipo_qtd'
    ];
}
