<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia\Candidato;

use App\Models\admin\sesau\residencia\Cedente;
use Livewire\Component;
use App\Models\Admin\Sesau\Residencia\TipoConselho;
use App\Models\Admin\Sesau\Residencia\Candidato;
use App\Models\Admin\Sesau\Residencia\TipoProcesso;
use Illuminate\Support\Facades\Auth;


class CandidatoFormComponent extends Component
{
    public $model, $form, $title, $modalId, $type, $formType, $modal, $modelName;
    public $data = [];
    public $openForm = false;
    public $tipoConselhos, $cedentes, $candidatos, $tipoProcessos;
    protected $listeners = [
        'editCrudForm' => 'edit',
        'deleteCrudForm' => 'delete',
        'selectedColumn',
        'selectedTitulo',
        'viewFormCrud'
    ];


    public function mount($title, $model, $form)
    {
        $this->title = $title;
        $this->model = $model;
        $this->form = $form;
        $this->tipoConselhos = TipoConselho::all();
        $this->tipoProcessos = TipoProcesso::all();
        $this->cedentes = Cedente::all();
        $this->candidatos = Candidato::all();
        $this->data['cpf'] = optional(Auth::user())->cpf;
        $this->data['nome'] = optional(Auth::user())->nome;
        $this->data['celular'] = optional(Auth::user())->celular;
        $this->data['nome_social'] = optional(Auth::user())->nome_social;
        $this->data['email'] = optional(Auth::user())->email;
    }

    public function render()
    {
        return view('livewire.admin.sesau.residencia.candidato.candidato-form-component');
    }

    public function edit($data)
    {
        // dd($data);
        try {
            $this->type = 'update';
            $this->data = $data;
        } catch (\Exception $ex) {
            session()->flash('message', 'Algo deu errado!!');
        }
    }

    public function delete($data)
    {
        // dd($data);
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
            // $this->data['user_id'] = Auth::user()->id;
            app($this->model)::create($this->data);
            session()->flash('message', 'Criado com sucesso!!');
            $this->resetFields();
            $this->emit('refreshCrudTable');
            $this->emit('formSaved');
            $this->emit('closeFormCrud');
        } catch (\Exception $ex) {
            dd($ex);
            session()->flash('message', 'Algo deu errado!!');
        }
    }


    public function update()
    {
        $this->validate(app($this->model)->rules);
        try {
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
        $this->data = ['user_id' => Auth::user()->id];
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
