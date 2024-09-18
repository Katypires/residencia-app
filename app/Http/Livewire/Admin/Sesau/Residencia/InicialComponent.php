<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;
use App\Models\Admin\Sesau\Residencia\Processo;

class InicialComponent extends Component
{
    public $showInscricaoForm = false;
    public $currentFormIndex = 0;
    public $processos;
    public $processo_id,$processo_nome;

    public function mount(){
        $this->processos = Processo::all();
        // $this->processo_id = $this->processos->first()->id;
        // $this->processo_nome = $this->processos->nome;
    }
    protected $listeners = [
        'showInscricaoForm',
        'formSaved' => 'handleFormSaved'
    ];

    public function render()
    {
        return view('livewire.admin.sesau.residencia.inicial-component');
    }

    public function showInscricaoForm($processo, $candidato_id,$processo_nome)
    {
        $this->showInscricaoForm = true;
        $this->emit('inscricao', $processo,$candidato_id,$processo_nome);
    }
}
