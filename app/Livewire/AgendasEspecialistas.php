<?php

namespace App\Livewire;

use App\Models\Agenda;
use App\Models\Especialista;
use Livewire\Component;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class AgendasEspecialistas extends Component
{
    public $especialistas;
    public $especialistasSeleccion = 1;
    public $agenda;

    public function mount()
    {
        $this->especialistas = Especialista::all();
    }

    public function updatedEspecialistasSeleccion()
    {
        $this->agenda = Agenda::where('especialista_id', $this->especialistasSeleccion)->get();
    }

    public function bloquear($diaYHora){
        $bloqueo = Agenda::create([
            'disponibilidad' => $diaYHora,
            'especialista_id' => $this->especialistasSeleccion,
        ]);

    }

    public function anular($idBloqueo){
        Agenda::where('id', $idBloqueo)->delete();
    }

    public function render()
    {
        return view('livewire.agendas-especialistas');
    }
}
