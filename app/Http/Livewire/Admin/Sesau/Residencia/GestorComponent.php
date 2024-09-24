<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;
use App\Models\Admin\Sesau\Residencia\Formulario;
use Livewire\WithPagination;

class GestorComponent extends Component
{
    use WithPagination;
    public $existingFiles;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'arquivosIsencao',
    ];

    public function render()
    {
        $formularios = Formulario::with('candidato')->paginate(5);

        return view('livewire.admin.sesau.residencia.gestor-component', [
            'formularios' => $formularios,
        ]);
    }

    public function arquivosIsencao($existingFiles)
    {
        $this->existingFiles = $existingFiles;
    }
}
