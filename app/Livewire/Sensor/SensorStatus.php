<?php

namespace App\Livewire\Sensor;

use App\Models\Sensor;
use Livewire\Component;

class SensorStatus extends Component
{
    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function status($sensorId)
    {
        
        $sensor = Sensor::findOrFail($sensorId);

        $sensor->status = !$sensor->status;

        $sensor->save();

        session()->flash('success', 'Status do sensor ' . $sensor->codigo . ' alterado com sucesso para ' . ($sensor->status ? 'ATIVO' : 'INATIVO') . '!');
    }

    public function render()
    {
        $sensors = Sensor::all();
        $sensors = Sensor::where('codigo', 'like', "%{$this->search}%")
            ->paginate(15);

        return view('livewire.sensor.sensor-status', compact('sensors'));
    }
}
