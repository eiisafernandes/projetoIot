<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteList extends Component
{

    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function render()
    {

        $ambientes = Ambiente::all();
        $ambientes = Ambiente::where('nome', 'like', "%{$this->search}%")
            ->paginate(15);

        return view('livewire.ambiente.ambiente-list', compact('ambientes'));
    }

    public function delete($id)
    {
        $ambiente = Ambiente::find($id);
        if($ambiente != null){
            $ambiente->delete();
        }

        session()->flash('success', 'Ambiente deletado com sucesso.');
    }
}
