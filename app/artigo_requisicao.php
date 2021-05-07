<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artigo_requisicao extends Model
{
    public $timestamp = 'true';
    public $table='artigo_requisicao';
    public $primaryKey='idartigo_requisicao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'artigo_idartigo','qtd', 'requisicao_idrequisicao'
    ];
}
