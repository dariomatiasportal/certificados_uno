<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion','plantilla','direccion','telefono','email','activo'];

    public function resolutions(){
        return $this->hasMany(Resolution::class,'id');
    }
}
