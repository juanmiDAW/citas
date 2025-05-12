<?php

namespace App\Livewire;

use App\Models\Agenda;
use App\Models\Especialista;
use Livewire\Component;

class AgendasEspecialistas extends Component
{
    public $especialistas;
    public $especialistasSeleccion;
    public $agenda;

    public function mount()
    {
        $this->especialistas = Especialista::all();
    }

    public function updatedEspecialistasSeleccion()
    {
        $this->agenda = Agenda::where('especialista_id', $this->especialistasSeleccion)->get();
    }

    public function render()
    {
        return view('livewire.agendas-especialistas');
    }
}
