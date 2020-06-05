<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    public $timestamp = 'true';
    //public $table='email';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'destinatario','cc','bcc','assunto', 'mensagem'
    ];
}
