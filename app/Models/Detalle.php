<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;

    protected $fillable = ['nota','module_id','certificate_id'];

    public function modules(){
        return $this->belongsTo(Module::class,'module_id');
    }

    public function certificates(){
        return $this->belongsTo(Certificate::class,'certificate_id');
    }
}
