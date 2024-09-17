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
        $this->data['email'] = $candidato->email;
        $this->data['nome_social'] = $candidato->nome_social;
        $this->data['sexo'] = $candidato->sexo;
        $this->data['rg'] = $candidato->rg;
        $this->data['orgao_expedidor'] = $candidato->orgao_expedidor;
        $this->data['expedicao_rg'] = $candidato->expedicao_rg;
        $this->data['pais_naturalidade'] = $candidato->pais_naturalidade;
        $this->data['estado_civil'] = $candidato->estado_civil;
        $this->data['cep'] = $candidato->cep;
        $this->data['cidade'] = $candidato->cidade;
        $this->data['estado'] = $candidato->estado;
        $this->data['endereco'] = $candidato->endereco;
        $this->data['bairro'] = $candidato->bairro;
        $this->data['numero'] = $candidato->numero;
        $this->data['complemento'] = $candidato->complemento;
        $this->data['conselho'] = $candidato->conselho;
        $this->data['curriculo_lattes'] = $candidato->curriculo_lattes;
        $this->data['curso'] = $candidato->curso;
        $this->data['instituicao'] = $candidato->instituicao;
        $this->data['pais_curso'] = $candidato->pais_curso;
        $this->data['cidade_curso'] = $candidato->cidade_curso;
        $this->data['estado_curso'] = $candidato->estado_curso;
        $this->data['exterior'] = $candidato->exterior;
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
        $this->data['bairro'] = strtoupper($data['bairro']);
        $this->data['endereco'] = strtoupper($data['logradouro']);
        $this->data['cidade'] = strtoupper($data['localidade']);
        $this->data['estado'] = strtoupper($data['uf']);
        //return $xml;
    }

    public function update()
    {
        $this->validate(app($this->model)->rules);
        try {
            app($this->model)::find($this->data['id'])->update($this->data);
            session()->flash('message', 'Atualizado com sucesso!!');
            $this->emit('refreshCrudTable');
            $this->emit('closeFormCrud');
            $this->emit('nextTab');
        } catch (\Exception $ex) {
            dd($ex);
            session()->flash('message', 'Algo deu errado!!');
        }
    }

    // private function resetFields()
    // {
    //     $this->resetErrorBag();
    //     $this->resetValidation();
    //     $this->data = [];
    //     $this->data = ['user_id' => Auth::user()->id];
    // }
}
