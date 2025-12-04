<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteCreate extends Component
{

    public $nome, $descricao, $status;

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

    public function store()
    {
        $this->validate();
        Ambiente::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status

        ]);

        session()->flash('success', 'Sucesso ao cadastrar!');
        return redirect()->route('ambientes.list');
    }

    public function render()
    {
        return view('livewire.ambiente.ambiente-create');
    }
}
