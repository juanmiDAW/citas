<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    /** @use HasFactory<\Database\Factories\AgendaFactory> */
    use HasFactory;

    protected $fillable = ['disponibilidad', 'especialista_id'];

    public function especialista(){
        return $this->belongsTo(Especialista::class);
    }

    public function reserva(){
        return $this->hasMany(Reserva::class);
    }
}
