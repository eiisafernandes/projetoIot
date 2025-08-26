<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensorCreate extends Component
{

     public $ambiente_id, $codigo, $descricao, $tipo, $status;

    public function store()
    {

        Sensor::create([
            'ambiente_id' => $this->ambiente_id,
            'codigo' => $this->codigo,
            'descricao' => $this->descricao,
            'tipo' => $this->tipo,            
            'status' => $this->status
            
        ]);

        session()->flash('message', 'Sucesso!');
        return redirect()->route('sensor.list');
    }

    public function render()
    {
        $ambientes = Ambiente::all();
        return view('livewire.sensor.sensor-create', compact('ambientes'));
    }
}
