<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Sesau\Residencia\Formulario;

class CrudFormComponent extends Component
{
    use WithFileUploads;

    public $model, $form, $title, $modalId, $type, $formType, $modelName, $dados = [];
    public $data = [];
    public $nome, $documento_id, $imagem;
    public $openForm = false;
    public $documento_provab, $documento_solicitacao_isencao, $documento_ampla_concorrencia;


    protected $listeners = [
        'editCrudForm' => 'edit',
        'deleteCrudForm' => 'delete',
        'selectedColumn',
        'selectedTitulo',
        'viewFormCrud'
    ];

    public function mount($dados, $formType, $title, $model, $form)
    {
        $this->data['cpf'] = optional(Auth::user())->cpf;
        $this->data['nome'] = optional(Auth::user())->nome;
        $this->data['celular'] = optional(Auth::user())->celular;
        $this->data['nome_social'] = optional(Auth::user())->nome_social;
        $this->data['email'] = optional(Auth::user())->email;
        // $this->data = $dados;
        $this->formType = $formType;
        $this->title = $title;
        $this->model = $model;
        $this->form = $form;
    }

    public function render()
    {
        $documentos = $this->model::where('user_id', Auth::id())->get();
        return view('livewire.admin.sesau.residencia.crud-form-component', compact('documentos'));
    }

    public function edit($data)
    {
        // dd("edit");      
        try {
            $this->type = 'update';
            $this->data = $data;
        } catch (\Exception $ex) {
            session()->flash('message', 'Algo deu errado!!');
        }
    }

    public function delete($data)
    {
        // dd("delete");
        try {
            $this->type = 'delete';
            $this->data = $data;
            //    dd($this->data['id']); 
        } catch (\Exception $ex) {
            session()->flash('message', 'Algo deu errado!!');
        }
    }

    public function store()
    {
        $this->validate(app($this->model)->rules);
        try {
            $this->data['user_id'] = Auth::id();
            app($this->model)::create($this->data);
            session()->flash('message', 'Criado com sucesso!!');
            $this->resetFields();
            $this->emit('refreshCrudTable');
            $this->emit('closeFormCrud');
            $this->emit('openTipoProcesso');
        } catch (\Exception $ex) {
            dd($ex);
            session()->flash('message', 'Algo deu errado!!');
        }
    }

    public function update()
    {
        // dd("update");
        $this->validate(app($this->model)->rules);
        try {
            $this->data['user_id'] = Auth::id();
            app($this->model)::find($this->data['id'])->update($this->data);
            session()->flash('message', 'Atualizado com sucesso!!');
            $this->emit('refreshCrudTable');
            $this->emit('closeFormCrud');
            $this->resetFields();
        } catch (\Exception $ex) {
            session()->flash('message', 'Algo deu errado!!');
        }
    }

    public function destroy()
    {
        // dd("destroy");
        try {
            $destroy = app($this->model)::find($this->data['id']);
            $destroy ? $destroy->delete() : false;
            session()->flash('message', "Deletado com sucesso!!");
            $this->emit('refreshCrudTable');
            $this->emit('closeFormCrud');
        } catch (\Exception $e) {
            session()->flash('message', "Algo deu errado!!");
        }
    }

    public function cancel()
    {
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->data = [];
    }

    public function selectedColumn($value, $label)
    {
        $this->data[$label] = $value;
    }

    public function selectedTitulo($value, $label)
    {
        $this->data[$label] = $value;
    }

    public function viewFormCrud($data)
    {
        $this->type = 'view';
        $this->data = $data;
    }
}
