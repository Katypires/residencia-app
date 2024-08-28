<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia\Crud;

use Livewire\Component;

class CrudComponent extends Component
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

    public function mount($formType, $title, $model, $form)
    {
       $this->formType = $formType;
       $this->title = $title;
       $this->model = $model;
       $this->form = $form;
    }
    
    public function render()
    {
        return view('livewire.admin.crud.crud-component');
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
