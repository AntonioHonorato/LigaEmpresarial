<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $fillable = ['nombre','fecha_inicio','fecha_fin','id_tipotorneo','activo'];
    protected $table='torneos';
}
