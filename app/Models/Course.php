<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','periodo','fecha_alta','horas','tipohs','modalidad',
                            'logo','objetivo','contenido','planilla_id','nota_final_aprobado','nota_modulo_aprobado',
                            'resultado','activo','resolution_id'];

    public function resolutions(){
        return $this->belongsTo(Resolution::class,'resolution_id');
    }

    public function modules(){
        return $this->hasMany(Module::class,'id');
    }
    public function certificates(){
        return $this->hasMany(Certificate::class,'id');
    }

}
