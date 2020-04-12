<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = ['nombre','activo'];
    protected $table = 'grupos';

    public function scopeActivo($query){
        return $query->where('activo',1);
    }
}
