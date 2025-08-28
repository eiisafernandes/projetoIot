<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensorCreate extends Component
{

    public $ambiente_id, $codigo, $descricao, $tipo, $status;

    protected $rules = [
        'codigo' => 'required|max:255|unique:sensors,codigo',
        'tipo' => 'required|max:255',
        'status' => 'required',
        'ambiente_id' => 'required'

    ];

    protected $messages = [
        'codigo.required' => 'O campo é obrigatório',
        'codigo.unique' => 'O campo deve ser único',
        'codigo.max' => 'O número máximo de caracteres é 80',
        'tipo.required' => 'O campo é obrigatório',
        'tipo.max' => 'O número máximo de caracteres é 255',
        'status.required' => 'O campo é obrigatório',
        'ambiente_id.required' => 'O campo é obrigatório',

    ];

    public function store()
    {
        $ambiente = Ambiente::find($this->ambiente_id);

        if ($ambiente == null) {
            session()->flash('error', 'O ambiente não existe!');
        }

        $this->validate();

        Sensor::create([
            'ambiente_id' => $this->ambiente_id,
            'codigo' => $this->codigo,
            'descricao' => $this->descricao,
            'tipo' => $this->tipo,
            'status' => $this->status

        ]);

        session()->flash('success', 'Sucesso ao cadastrar!');
        return redirect()->route('sensor.list');
    }

    public function render()
    {
        $ambientes = Ambiente::all();
        return view('livewire.sensor.sensor-create', compact('ambientes'));
    }
}
