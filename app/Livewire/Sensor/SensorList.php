<?php

namespace App\Livewire\Sensor;

use App\Models\Sensor;
use Livewire\Component;

class SensorList extends Component
{

    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function render()
    {

        $sensors = Sensor::all();
        $sensors = Sensor::where('codigo', 'like', "%{$this->search}%")
            ->paginate(15);

        return view('livewire.sensor.sensor-list', compact('sensors'));
    }

    public function delete($id)
    {
        $sensor = Sensor::find($id);
        if($sensor != null){
            $sensor->delete();
        }

        session()->flash('success', 'Sensor deletado com sucesso.');
    }
}
