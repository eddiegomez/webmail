<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public $timestamp = 'true';
    public $table='endereco';
    public $primaryKey='idendereco';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provincia','cidade','bairro', 'avenida', 'quarteirao','numero'
    ];
}
