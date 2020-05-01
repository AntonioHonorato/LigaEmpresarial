<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = ['nombre','id_torneo','activo'];
    protected $table = 'grupos';

    public function scopeActivo($query){
        return $query->where('activo',1);
    }
}
