<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia\Candidato;

use Livewire\Component;

class CandidatoComponent extends Component
{
    public $modal, $model, $form, $title, $modalId, $formType, $key;
    public $data = [];
    public $openForm = false;
    public $emitForm;
    
    protected $listeners = [
        'closeFormCrud',
        'openCloseFormCrud',
        'openEditFormCrud',
        'openDeleteFormCrud',
        'deleteComponent',
        'editComponent',
        'openViewFormCrud'
    ];

    public function mount($title, $model, $form)
    {
       $this->title = $title;
       $this->model = $model;
       $this->form = $form;
    }
    
    public function render()
    {
        return view('livewire.admin.sesau.residencia.candidato.candidato-component');
    }

    public function closeFormCrud()
    {
        $this->openForm =  false;
    }

    public function openCloseFormCrud($form)
    {
        dd("openCloseFormCrud");
        $this->emitForm = $form;
        $this->openForm =  !$this->openForm;
    }

    public function openEditFormCrud($data, $form)
    {    
        // dd($data, $this->form, $form);
        $this->emitForm = $form;
        $this->openForm =  true;
        $this->emit('editCrudForm', $data);
    }

    public function openDeleteFormCrud($data, $form)
    {
        // dd("openDeleteFormCrud");
        // dd($data);
        $this->emitForm = $form;
        $this->openForm =  true;
        $this->emit('deleteCrudForm', $data);
    }

    public function openViewFormCrud($data,$form){
        // dd($data);
        $this->emitForm = $form;
        $this->emit('viewFormCrud', $data);
    }
}
