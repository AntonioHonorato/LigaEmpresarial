<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTorneo extends Model
{
    protected $fillable = ['nombre','activo'];
    protected $table = 'tipotorneo';
}
