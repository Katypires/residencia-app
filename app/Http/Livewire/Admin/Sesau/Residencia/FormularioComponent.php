<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;

class FormularioComponent extends Component
{
    public $documentos;
    
    public function render()
    {
        return view('livewire.admin.sesau.residencia.formulario-component');
    }
}
