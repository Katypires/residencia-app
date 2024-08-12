<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;
use App\Models\Admin\Sesau\Residencia\TipoProcesso;
use Illuminate\Support\Facades\Auth;


class DadosFinaisComponent extends Component
{
    public $openDadosFinais;
    public $categoria, $tipoProcesso;
    public $inscricao;

    public function mount()
    {
        $this->inscricao = TipoProcesso::where('user_id', Auth::id())->first();
    }

    public function render()
    {
        return view('livewire.admin.sesau.residencia.dados-finais-component', [
            'inscricao' => $this->inscricao,
        ]);
    }

    public function openDadosFinais()
    {
        $this->openDadosFinais = true;
    }

    public function categoria($value)
    {
        // dd($value);
        $this->categoria = $value;
    }
}
