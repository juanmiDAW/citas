<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    /** @use HasFactory<\Database\Factories\EspecialidadFactory> */
    use HasFactory;

    protected $table = 'especialidades';

    protected $fillable = ['especialidad'];

    public function companias(){
        return $this->belongsToMany(Compania::class, 'compania_especialidad');
    }

    public function especialistas(){
        return $this->hasMany(Especialista::class);
    }


}
