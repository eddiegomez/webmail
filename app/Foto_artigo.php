<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto_artigo extends Model
{
    public $timestamp = 'true';
    public $table='foto_artigo';
    public $primaryKey='idfoto_artigo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'artigo_idartigo', 'foto_idfoto'
    ];
}
