<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{   
    protected $fillable = ['equipo','capacidad','activo'];
    protected $table = 'equipos';

    //selector en la base de datos
    public function scopeActivo($query){
        return $query->where('activo',1);
    }
}
