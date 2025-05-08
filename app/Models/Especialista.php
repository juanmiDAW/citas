<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialista extends Model
{
    /** @use HasFactory<\Database\Factories\EspecialistaFactory> */
    use HasFactory;

    protected $fillable = ['nombre', 'especialidad_id'];

    public function especialidad(){
        return $this->belongsTo(Especialidad::class);
    }

    public function agenda(){
        return $this->hasOne(Agenda::class);
    }
}
