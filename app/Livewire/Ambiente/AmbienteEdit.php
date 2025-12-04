<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteEdit extends Component
{

    public $ambienteId, $nome, $descricao, $status;

     protected function rules()
    {
        return [
            'nome' => 'required',
            'status' => 'required'
        ];
    }

    protected $messages = [
        'nome.required' => 'O campo é obrigatório',
        'status.required' => 'O campo é obrigatório'
    ];

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
        $this->validate();

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
