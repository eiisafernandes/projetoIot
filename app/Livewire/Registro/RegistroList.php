<?php

namespace App\Livewire\Registro;

use App\Models\Registro;
use Livewire\Component;

class RegistroList extends Component
{
    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function render()
    {

        $registros = Registro::orderBy('id', 'desc')->get();
        $registros = Registro::where('id', 'like', "%{$this->search}%")
        ->paginate(15);

        return view('livewire.registro.registro-list', compact('registros'));
    }

    public function delete($id)
    {
        $registro = Registro::find($id);
        if ($registro != null) {
            $registro->delete();
        }

        session()->flash('success', 'Registro deletado com sucesso.');
    }
}
