<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grupo_equipo extends Model
{
    protected $fillable = ['id_grupo','id_equipo'];
    protected $table = 'grupos_equipos';
}
