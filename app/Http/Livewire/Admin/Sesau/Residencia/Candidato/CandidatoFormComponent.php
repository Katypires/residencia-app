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
        $candidato = Candidato::where('user_id', Auth::user()->id)->first();
        $this->title = $title;
        $this->model = $model;
        $this->form = $form;
        $this->tipoProcessos = TipoProcesso::all();
        $this->cedentes = Cedente::all();
        $this->candidatos = Candidato::all();
        $this->data['id'] = $candidato->id;
        $this->data['cpf'] = $candidato->cpf;
        $this->data['nome'] = $candidato->nome;
        $this->data['celular'] = $candidato->celular;
        $this->data['nome_social'] = $candidato->nome_social;
        $this->data['email'] = $candidato->email;
    }

    public function render()
    {
        return view('livewire.admin.sesau.residencia.candidato.candidato-form-component');
    }

    public function get_endereco(){
        if (!isset($this->data['cep']) || empty($this->data['cep'])) {
            return;
        }
        $cep = $this->data['cep'];
     
        // formatar o cep removendo caracteres nao numericos
        $cep = preg_replace("/[^0-9]/", "", $cep);
        $url = "http://viacep.com.br/ws/$cep/xml/";

        $endereco = $xml = simplexml_load_file($url);
        $data = get_object_vars($endereco);
        // dd($data);
        $this->data['bairro'] = $data['bairro'];
        $this->data['endereco'] = $data['logradouro'];
        $this->data['cidade'] = $data['localidade'];
        $this->data['estado'] = $data['uf'];
        $this->data['pais'] = "BRASIL";
        //return $xml;
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
            dd($ex);
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
