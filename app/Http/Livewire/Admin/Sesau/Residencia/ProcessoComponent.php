<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;

class ProcessoComponent extends Component
{
    public $title, $texto,$modalId;
    public function render()
    {
        return view('livewire.admin.sesau.residencia.processo-component');
    }
}
