<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;
use App\Models\Admin\Sesau\Residencia\Candidato;

class CandidatoComponent extends Component
{
    public $data = [
        'nome' => '',
        'nome_social' => '',
        'celular' => '',
        'email' => '',
        'cpf' => '',
    ];
    public $candidato;
    public function render()
    {
        return view('livewire.admin.sesau.residencia.candidato-component');
    }

    public function store()
    {
        $this->validate([
            'data.nome' => 'required',
        ]);

        try {

            $candidato = Candidato::create($this->data);
            $this->emit('openCategoria');
            $this->emit(
                'enviarDados',
                [
                    'nome' => $this->data['nome'],
                    'nome_social' => $this->data['nome_social'],
                    'celular' => $this->data['celular'],
                    'email'=> $this->data['email'],
                    'cpf'=> $this->data['cpf'],
                ]
            );
            session()->flash('message', 'Login efetuado com sucesso');
        } catch (\Throwable $th) {
            dd($th);
            session()->flash(
                'message',
                'Não foi possível cadastrar/atualizar informação.'
            );
        }
    }
}
