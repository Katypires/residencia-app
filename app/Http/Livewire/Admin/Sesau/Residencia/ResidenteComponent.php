<?php

namespace App\Http\Livewire\Admin\Sesau\Residencia;

use Livewire\Component;

class ResidenteComponent extends Component
{
    public $tipoProcesso;
    public $openForm,$openTipoProcesso,$openDadosFinais;
    public $openCategoria = true;
    public $openCadastro = true;
    public $dados = [];
    public $nome,$email,$cpf,$celular,$nome_social,$value,$categoriaSelecionada;

    protected $listeners = [
        "openTipoProcesso" => "openTipoProcesso",
        "enviarDados" => "dadosEnviados",
        "tipoProcesso" => "tipoProcesso",
        "openCategoria"=> "openCategoria",
    ];

    
    public function render()
    {
        return view('livewire.admin.sesau.residencia.residente-component');
    }

    public function openCategoria()
    {
        $this->openCategoria = true;
        $this->openCadastro = false;
    }

    public function openForm()
    {
        $this->openForm = true;
        $this->openCategoria = false;
    }

    public function openTipoProcesso()
    {
        $this->openTipoProcesso = true;
        $this->openForm = false;
    }

    public function openDadosFinais()
    {
        $this->openDadosFinais = true;
        $this->openTipoProcesso = false;
    }

    public function dadosEnviados($dados)
    {
        $this->dados = $dados;
        $this->nome = $dados['nome'];
        $this->email = $dados['email'];
        $this->cpf = $dados['cpf'];
        $this->celular = $dados['celular'];
        $this->nome_social = $dados['nome_social'];
    }

    public function categoriaSelecionada($value)
    {
       $this->categoriaSelecionada = $value; 
       $this->emit('categoria', $value);
    }

    public function tipoProcesso($value)
    {
        $this->tipoProcesso = $value;
    }
    public function cancelarSelecao()
    {
        $this->categoriaSelecionada = null;
    }
}
