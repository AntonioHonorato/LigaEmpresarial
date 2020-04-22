<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $fillable =['tamarilla','troja','id_jugador','activo'];
    protected $table = 'tarjetas';
}
