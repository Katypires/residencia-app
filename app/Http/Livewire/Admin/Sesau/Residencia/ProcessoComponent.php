<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;

class ProcessoComponent extends Component
{
    public $title, $texto, $modalId;

    public $valor, $imagem, $data_inicio, $data_final, $data_vencimento, $situacao, $formacao, $qualificacao, $experiencia, $tipo_processo, $processo;

    public $processo_id;
    public function render()
    {
        return view('livewire.admin.sesau.residencia.processo-component');
    }
}
