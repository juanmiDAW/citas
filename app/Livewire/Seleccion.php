<?php

namespace App\Livewire;

use App\Models\Compania;
use App\Models\Especialidad;
use App\Models\Especialista;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class Seleccion extends Component
{
    public $companias;
    public $companiasSeleccion;
    public $especialidades;
    public $especialidadesSeleccion;
    public $especialistas;
    public $agenda;
    public $reservas;
    public $pacientes;

    public function mount(){
        $this->companias = Compania::all();
 
    }

    public function updatedCompaniasSeleccion(){
        $this->especialidades = Compania::with('especialidades')->find($this->companiasSeleccion)->especialidades;
    }

    public function updatedEspecialidadesSeleccion(){
        $this->especialistas= Especialidad::with('especialistas')->find($this->especialidadesSeleccion)->especialistas;
    }

    public function render()
    {
        return view('livewire.seleccion');
    }
}
