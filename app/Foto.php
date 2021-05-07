<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    public $timestamp = 'true';
    public $table='foto';
    public $primaryKey='idfoto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foto'
    ];
}
