<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = ['rol','fecha_alta','usuario_alta','cuv','certificado_estado','certificado_fecha_envio',
                        'certificado_fecha_reenvio','certificado_usuario_reenvio','nota','id_person','id_course'];


    public function detalles(){
        return $this->hasMany(Detalle::class,'id');
    }

    public function courses(){
        return $this->belongsTo(Course::class,'id_course');
    }
    public function people(){
        return $this->belongsTo(Person::class,'id_person');
    }

}
