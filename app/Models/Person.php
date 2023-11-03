<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','apellido','dni','email','telefono','domicilio','localidad','provincia'];

    public function certificates(){
        return $this->hasMany(Certificate::class,'id');
    }
}
