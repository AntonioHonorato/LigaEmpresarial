<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cede extends Model
{
    protected $fillable = ['nombre','activo'];
    protected $table= 'cedes';
    
    public function scopeActivo($query)
    {
        return $query->where('activo',1);
    }
}
