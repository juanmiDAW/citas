<?php

namespace App\Models;

use Illuminate\Cache\Events\RetrievingKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    /** @use HasFactory<\Database\Factories\CompaniaFactory> */
    use HasFactory;

    protected $fillable = ['denominacion'];

    public function especialidades(){
        return $this->belongsToMany(Especialidad::class, 'compania_especialidad');
    }
}
