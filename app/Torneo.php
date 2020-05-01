<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $fillable = ['nombre','jugadores','fecha_inicio','fecha_fin','activo'];
    protected $table='torneos';
}
