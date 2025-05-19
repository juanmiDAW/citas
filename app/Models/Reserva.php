<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    /** @use HasFactory<\Database\Factories\ReservaFactory> */
    use HasFactory;

    protected $fillable = ['agenda_id', 'paciente_id', 'especiaista_id'];

    public function agenda(){
        return $this->belongsTo(Agenda::class);
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
