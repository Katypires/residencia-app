<?php

namespace App\Models\Admin\Sesau\Residencia;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Kdion4891\LaravelLivewireTables\Column;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;
    protected $table = 'residencia.candidatos';
    protected $fillable = ['user_id', 'nome', 'nome_social', 'celular', 'email', 'cpf', 'sexo', 'rg', 'orgao_expedidor', 'expedicao_rg', 'pais_naturalidade', 'estado_civil', 'cep', 'cidade', 'estado', 'endereco', 'bairro', 'numero', 'complemento', 'curriculo_lattes', 'conselho', 'curso', 'instituicao', 'pais', 'cidade_curso', 'estado_curso', 'exterior', 'status',];
    protected $hidden = [
        'cpf',
        'email',
    ];
    public $rules = [
        'data.nome' => 'required|string|max:255',
        'data.nome_social' => 'nullable|string|max:255',
        'data.celular' => 'required|string|max:20',
        'data.email' => 'required|email|max:255',
        'data.cpf' => 'required|string|size:11',
        'data.sexo' => 'required|string|in:masculino,feminino,outro',
        'data.rg' => 'required|string|max:20',
        'data.orgao_expedidor' => 'required|string|max:50',
        'data.expedicao_rg' => 'required|date',
        'data.pais_naturalidade' => 'required|string|max:100',
        'data.estado_civil' => 'required|string|in:solteiro,casado,divorciado,viuvo,outro',
        'data.cep' => 'required|string|size:8',
        'data.cidade' => 'required|string|max:100',
        'data.estado' => 'required|string|max:2',
        'data.endereco' => 'required|string|max:255',
        'data.bairro' => 'required|string|max:100',
        'data.complemento' => 'nullable|string|max:255',
        'data.curriculo_lattes' => 'nullable|url',
        'data.conselho' => 'nullable|string|max:255',
        'data.curso' => 'required|string|max:255',
        'data.instituicao' => 'required|string|max:255',
        'data.cidade_curso' => 'required|string|max:100',
        'data.estado_curso' => 'required|string|max:2',
        'data.exterior' => 'required|boolean',
        'data.status' => 'nullable|boolean',
    ];


    public static function createdModel()
    {
        return [
            'status' =>  true,
            'user_id' =>  Auth::user()->id,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function columns_modal_card()
    {
        return [
            Column::make('id')->searchable()->sortable(),
            Column::make('nome')->searchable()->sortable(),
            Column::make('action')->view('livewire.admin.crud.table.actions'),
        ];
    }
    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtoupper($value);
    }

    public function setCidadeAttribute($value)
    {
        $this->attributes['cidade'] = strtoupper($value);
    }

    public function setEstadoAttribute($value)
    {
        $this->attributes['estado'] = strtoupper($value);
    }

    public function setEnderecoAttribute($value)
    {
        $this->attributes['endereco'] = strtoupper($value);
    }

    public function setBairroAttribute($value)
    {
        $this->attributes['bairro'] = strtoupper($value);
    }
}
