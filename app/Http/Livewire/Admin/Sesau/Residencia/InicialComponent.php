<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;
use App\Models\Admin\Sesau\Residencia\Processo;
use App\Models\Admin\Sesau\Residencia\Inscricao;
use App\Models\Admin\Sesau\Residencia\Formulario;
use App\Models\Admin\Sesau\Residencia\ProcessoTipoVaga;
use Illuminate\Support\Facades\Auth;


class InicialComponent extends Component
{
    public $showInscricaoForm = false;
    public $currentFormIndex = 0;
    public $processos;
    public $processo_id, $processo_nome, $inscricoes, $tipoVagas;

    public function mount()
    {
        $this->processos = Processo::all();
        $this->inscricoes = Inscricao::where('candidato_id', Auth::user()->id)->with('formulario')->get();

        $formularios = Formulario::where('candidato_id', Auth::user()->id)->get();
    }


    protected $listeners = [
        'showInscricaoForm',
        'formSaved' => 'handleFormSaved'
    ];

    public function render()
    {
        return view('livewire.admin.sesau.residencia.inicial-component');
    }

    public function showInscricaoForm($processo, $candidato_id, $processo_nome)
    {
        $this->showInscricaoForm = true;
        $this->emit('inscricao', $processo, $candidato_id, $processo_nome);
    }
}
