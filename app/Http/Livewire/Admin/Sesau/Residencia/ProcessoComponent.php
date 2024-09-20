<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;
use App\Models\Admin\Sesau\Residencia\ProcessoEdital;
use App\Models\Admin\Sesau\Residencia\ProcessoVaga;


class ProcessoComponent extends Component
{
    public $processo_nome, $descricao, $modalId;

    public $valor, $imagem, $data_inicio, $data_final, $data_vencimento, $situacao, $formacao, $qualificacao, $experiencia, $tipo_processo, $processo;

    public $processo_id, $editais,$vagas,$processoTipoVagas;

    public function mount($processo_id)
{
    $this->editais = ProcessoEdital::where('processo_id', $processo_id)->get();
    $this->vagas = ProcessoVaga::where('processo_id', $processo_id)->get();
    $processoVagas = ProcessoVaga::where('processo_id', $processo_id)->with('processo_tipo_vagas')->get();
    
    $this->processoTipoVagas = $processoVagas->flatMap(function($vaga) {
        return $vaga->processo_tipo_vagas;
    });
}

    public function render()
    {
        return view('livewire.admin.sesau.residencia.processo-component');
    }
}
