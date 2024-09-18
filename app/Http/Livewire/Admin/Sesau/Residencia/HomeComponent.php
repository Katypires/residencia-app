<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;
use App\Models\Admin\Sesau\Residencia\ProcessoVaga;
use App\Models\Admin\Sesau\Residencia\ProcessoEdital;

use Livewire\Component;

class HomeComponent extends Component
{
    public $vagas, $editais,$processoTipoVagas;
    public function mount (){
        $this->vagas = ProcessoVaga::all();
        $this->editais = ProcessoEdital::all();
    }
    public function render()
    {
        return view('livewire.admin.sesau.residencia.home-component');
    }
}
