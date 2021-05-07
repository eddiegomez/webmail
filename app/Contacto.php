<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    public $timestamp = 'true';
    public $table='contacto';
    public $primaryKey='idcontacto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'celular','email'
    ];
}
