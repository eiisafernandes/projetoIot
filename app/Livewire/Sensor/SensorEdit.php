<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensorEdit extends Component
{
    public $sensorId, $ambiente_id, $codigo, $descricao, $tipo, $status;

    protected function rules()
    {
        return [
            'codigo' => 'max:255|unique:sensors,codigo,' . $this->sensorId,
            'tipo' => 'max:255'
        ];
    }

    protected $messages = [
        'codigo.unique' => 'O campo deve ser único',
        'codigo.max' => 'O número máximo de caracteres é 80',
        'tipo.max' => 'O número máximo de caracteres é 255',

    ];

    public function mount($id)
    {
        $sensor = Sensor::findOrFail($id);

        if ($sensor == null) {
            session()->flash('error', 'Sensor não encontrado');
            return redirect()->route('sensor.list');
        }

        $this->sensorId = $sensor->id;
        $this->ambiente_id = $sensor->ambiente->id;
        $this->codigo = $sensor->codigo;
        $this->descricao = $sensor->descricao;
        $this->tipo = $sensor->tipo;
        $this->status = $sensor->status;
    }

    public function update()
    {
        $this->validate();

        $sensor = Sensor::findOrFail($this->sensorId);

        $sensor->update([
            'codigo' => $this->codigo,
            'ambiente_id' => $this->ambiente_id,
            'tipo' => $this->tipo,
            'descricao' => $this->descricao,
            'status' => $this->status
        ]);

        session()->flash('success', 'Sensor atualizado com sucesso!');
        return redirect()->route('sensor.list');
    }

    public function render()
    {
        $ambientes = Ambiente::all();
        return view('livewire.sensor.sensor-edit', compact('ambientes'));
    }
}
