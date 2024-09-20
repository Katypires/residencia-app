<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;
use App\Models\Admin\Sesau\Residencia\Processo;
use App\Models\Admin\Sesau\Residencia\Candidato;



class InscricaoComponent extends Component
{
    public $currentTab = 'candidato';
    public $processo_id, $processo_nome;
    public $candidato_id, $formulario_id, $candidato;
    public $inscricaoNomeCandidato, $inscricaoNomeProcesso;

    public $model;
    public $data = [];

    protected $listeners = [
        'nextTab',
        'inscricao',
        'dadosInscricao'
    ];
    public function mount() {}
    public function nextTab()
    {
        if ($this->currentTab === 'candidato') {
            $this->currentTab = 'formulario';
        } else if ($this->currentTab ===  'formulario') {
            $this->currentTab = 'conclusao';
        }
    }
    public function render()
    {
        return view('livewire.admin.sesau.residencia.inscricao.inscricao-component');
    }

    public function inscricao($processo_id, $candidato_id, $processo_nome)
    {
        $this->candidato_id = $candidato_id;
        $this->processo_id = $processo_id;
        $this->processo_nome = $processo_nome;
    }

    public function dadosInscricao($candidato_id, $processo_id, $formulario_id)
    {
        $this->candidato_id = $candidato_id;
        $this->processo_id = $processo_id;
        $this->formulario_id = $formulario_id;
    }
    public function confirmaInscricao()
    {
        $this->validate(app($this->model)->rules);

        $existeInscricao = $this->model::where('candidato_id', $this->candidato_id)
            ->where('processo_id', $this->processo_id)
            ->exists();
        if ($existeInscricao) {
            session()->flash('message', 'Você já está inscrito neste processo!');
            return;
        }
        try {
            $inscricao = $this->model::updateOrCreate(
                [
                    'candidato_id' => $this->candidato_id,
                    'processo_id' => $this->processo_id,
                    'formulario_id' => $this->formulario_id
                ],
                $this->data
            );

            $this->inscricaoNomeCandidato = $inscricao->candidato->nome;
            $this->inscricaoNomeProcesso = $inscricao->processo->nome;

            session()->flash('message', 'Salvo com sucesso!!');
        } catch (\Exception $ex) {
            dd($ex);
            session()->flash('message', 'Algo deu errado!!');
        }
    }
}
