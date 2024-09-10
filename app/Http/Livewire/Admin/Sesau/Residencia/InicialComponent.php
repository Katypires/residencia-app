<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;
use App\Models\Admin\Sesau\Residencia\Processo;

class InicialComponent extends Component
{
    public $showInscricaoForm = false;
    public $currentFormIndex = 0;
    public $processos;
    public $forms = [
        'candidato' => [
            'title' => 'Formulário Candidato',
            'model' => 'App\Models\Admin\Sesau\Residencia\Candidato',
            'form' => 'admin.sesau.residencia.formularios.candidatos.form'
        ],
        'experiencia' => [
            'title' => 'Formulário Experiência',
            'model' => 'App\Models\Admin\Sesau\Residencia\Experiencia',
            'form' => 'admin.sesau.residencia.formularios.experiencias.form'
        ],
        'formacao' => [
            'title' => 'Formulário Formações',
            'model' => 'App\Models\Admin\Sesau\Residencia\Formacao',
            'form' => 'admin.sesau.residencia.formularios.formacoes.form'
        ],
        'cedente' => [
            'title' => 'Formulário Cedente',
            'model' => 'App\Models\Admin\Sesau\Residencia\Cendente',
            'form' => 'admin.sesau.residencia.formularios.cedentes.form'
        ],
    ];

    public function mount(){
        $this->processos = Processo::all();
    }
    protected $listeners = [
        'showInscricaoForm',
        'formSaved' => 'handleFormSaved'
    ];

    public function render()
    {
        return view('livewire.admin.sesau.residencia.inicial-component',[
            'isLastForm' => $this->isLastForm(),
            'currentForm' => $this->getCurrentForm(),
        ]);
    }

    public function showInscricaoForm()
    {
        $this->showInscricaoForm = true;
    }

    public function handleFormSaved()
    {
        $this->currentFormIndex++;
    }

    public function getCurrentForm()
    {
        $formKeys = array_keys($this->forms);
        return $this->forms[array_keys($this->forms)[$this->currentFormIndex]];
    }

    public function isLastForm()
    {
        return $this->currentFormIndex >= count($this->forms) - 1;
    }

}
