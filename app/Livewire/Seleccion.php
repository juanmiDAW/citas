<?php

namespace App\Livewire;

use App\Models\Compania;
use App\Models\Especialidad;
use App\Models\Especialista;
use App\Models\Paciente;
use App\Models\Reserva;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class Seleccion extends Component
{
    public $companias;
    public $companiasSeleccion;
    public $especialidades;
    public $especialidadesSeleccion;
    public $especialistas;
    public $especialistaSeleccion;
    public $agenda;
    public $reservas;
    public $paciente;

    public function mount(){
        $this->companias = Compania::all();
        $this->paciente = Paciente::where('nombre', auth()->user()->name)->first();
    }

    public function updatedCompaniasSeleccion(){
        $this->especialidades = Compania::find($this->companiasSeleccion)->especialidades;
    }

    public function updatedEspecialidadesSeleccion(){
        $this->especialistas= Especialidad::with('especialistas')->find($this->especialidadesSeleccion)->especialistas;
    }


    public function reservar($diaYHora){
        Reserva::create([
            'reserva' => $diaYHora,
            'paciente_id' => $this->paciente->id
        ]);

    }

    public function anular($reservadaId){
        Reserva::where('id', $reservadaId)->delete();
    }

    public function render()
    {
        return view('livewire.seleccion');
    }
}
