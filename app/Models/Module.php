<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion','nota_aprobado','contenido','course_id'];

    public function courses(){
        return $this->belongsTo(Course::class,'course_id');
    }

    public function detalles(){
        return $this->hasMany(Detalle::class,'id');
    }
}
