<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    use HasFactory;

    protected $fillable = ['numero','nombre_curso','fecha_alta','firma','plantilla','archivo','unit_id'];

    public function units(){
        return $this->belongsTo(Unit::class,'unit_id');
    }

    public function courses(){
        return $this->hasMany(Course::class,'id');
    }
}

