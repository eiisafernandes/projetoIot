<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteCreate extends Component
{

    public $nome, $descricao, $status;

    public function store()
    {

        Ambiente::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status
            
        ]);

        session()->flash('message', 'Sucesso!');
        return redirect()->route('ambientes.list');
    }

    public function render()
    {
        return view('livewire.ambiente.ambiente-create');
    }
}
