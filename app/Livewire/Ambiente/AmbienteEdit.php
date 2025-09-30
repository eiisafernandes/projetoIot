<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteEdit extends Component
{

    public $ambienteId, $nome, $descricao, $status;

    public function mount($id)
    {
        $ambiente = Ambiente::findOrFail($id);

        $this->ambienteId = $ambiente->id;
        $this->nome = $ambiente->nome;
        $this->descricao = $ambiente->descricao;
        $this->status = $ambiente->status;
    }

     public function update()
    {

        $ambiente = Ambiente::findOrFail($this->ambienteId);

        $ambiente->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status
        ]);

        session()->flash('success', 'Ambiente atualizado com sucesso!');
        return redirect()->route('ambientes.list');
    }

    public function render()
    {
        return view('livewire.ambiente.ambiente-edit');
    }
}
