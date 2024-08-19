<?php

namespace App\Models\Admin\Sesau\Residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Kdion4891\LaravelLivewireTables\Column;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class Formulario extends Model 
{
    use HasFactory;
    protected $table = 'residencia.formularios';
    protected $fillable = ['tipo_inscricao', 'nome', 'nome_social', 'cpf', 'celular', 'email', 'data_nascimento', 'rg', 'orgao_expedidor', 'expedicao_rg', 
    'crm', 'crm_estado', 'sexo', 'pais_naturalidade', 'estado_civil', 'cep', 'cidade', 'estado', 'endereco', 'bairro', 'numero', 'complemento', 'instituicao_graduacao', 'ano_conclusao', 
    'cidade_instituicao', 'estado_instituicao', 'ocupacao_profissao', 'curriculo', 'provab', 'tipo_vaga', 'leitura_edital', 'termo_aceitacao', 
    'solicitacao_isencao','documento_ampla_concorrencia','documento_solicitacao_isencao','documento_provab', 'user_id'];

    public $rules = [   
        // 'data.tipo_inscricao' => 'required',
        // 'data.nome' => 'required',
        // 'data.cpf'=> 'required',
        // 'data.celular'=> 'required',
        // 'data.email'=> 'required',   
        // 'data.data_nascimento'=> 'required',
        // 'data.rg'=> 'required',
        // 'data.orgao_expedidor'=> 'required',
        // 'data.expedicao_rg'=> 'required',
        // 'data.crm'=> 'required',
        // 'data.crm_estado'=> 'required',
        // 'data.sexo'=> 'required',
        // 'data.pais_naturalidade'=> 'required',
        // 'data.estado_civil'=> 'required',
        // 'data.cep'=> 'required',
        // 'data.cidade'=> 'required',
        // 'data.estado'=> 'required',
        // 'data.endereco'=> 'required',
        // 'data.bairro'=> 'required',
        // 'data.numero'=> 'required',
        // 'data.instituicao_graduacao'=> 'required',
        // 'data.ano_conclusao'=> 'required',
        // 'data.cidade_instituicao'=> 'required',
        // 'data.estado_instituicao'=> 'required',
        // 'data.ocupacao_profissao'=> 'required',
        // 'data.provab'=> 'required',
        // 'data.tipo_vaga'=> 'required',
        // 'data.leitura_edital'=> 'required',
        'data.termo_aceitacao'=> 'required',
        // 'data.solicitacao_isencao'=> 'required',
        // 'data.documento_ampla_concorrencia'=>'file',
        // 'data.documento_solicitacao_isencao'=>'file',
        // 'data.documento_provab'=>'file',
    ];

    public static function columns()
    {
        return [
            Column::make('ID')->searchable()->sortable(),
            Column::make('Nome do Candidato', 'nome')->searchable()->sortable(),
            Column::make('Email', 'email')->searchable()->sortable(),
            Column::make('CPF', 'cpf')->searchable()->sortable(),
            Column::make('data_nascimento', 'data_nascimento')->searchable()->sortable(),
            Column::make('Ações')->view('livewire.admin.sesau.residencia.table.table-actions'),
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //CODIGO PARA SALVAR EM MAISCULO
    // public function setNomeAttribute($value){
    //     $this->attributes['nome'] = strtoupper($value);
    // }
}