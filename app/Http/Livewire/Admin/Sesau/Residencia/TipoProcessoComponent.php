<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;
use App\Models\Admin\Sesau\Residencia\TipoProcesso;
use Illuminate\Support\Facades\Auth;



class TipoProcessoComponent extends Component
{
    public $data = [
        'residencia_multiprofissional_saude_mental' => false,
        'residencia_multiprofissional_saude_familia' => false,
        'residencia_medica_psiquiatria' => false,
        'residencia_familia_comunidade' => false,
    ];
    public $tipoProcesso, $inscrito, $categoria;
    public $isInscrito;

    protected $listeners = ['categoria'];

    public function mount()
    {
        $inscricao = TipoProcesso::where('user_id', Auth::id())->first();
        if ($inscricao) {
            $this->data = [
                'residencia_familia_comunidade' => $inscricao->residencia_familia_comunidade,
                'residencia_medica_psiquiatria' => $inscricao->residencia_medica_psiquiatria,
                'residencia_multiprofissional_saude_mental' => $inscricao->residencia_multiprofissional_saude_mental,
                'residencia_multiprofissional_saude_familia' => $inscricao->residencia_multiprofissional_saude_familia,
            ];
        }
    }

    public function render()
    {
        return view('livewire.admin.sesau.residencia.tipo-processo-component');
    }

    public function categoria($value)
    {
        $this->categoria = $value;
    }

    public function inscrever($value)
    {
        $this->data[$value] =  !$this->data[$value];
        $this->salvarInscricao();
    }

    public function salvarInscricao()
    {
        TipoProcesso::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'residencia_familia_comunidade' => $this->data['residencia_familia_comunidade'],
                'residencia_medica_psiquiatria' => $this->data['residencia_medica_psiquiatria'],
                'residencia_multiprofissional_saude_mental' => $this->data['residencia_multiprofissional_saude_mental'],
                'residencia_multiprofissional_saude_familia' => $this->data['residencia_multiprofissional_saude_familia'],
            ]
        );
    }
}
