<?php

namespace App\Models\Admin\Sesau\Residencia;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Kdion4891\LaravelLivewireTables\Column;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    use HasFactory;
    protected $table='residencia.processos';

    protected $fillable = ['tipo_processo_id', 'cedente_id', 'nome', 'descricao', 'valor', 'imagem', 'status',
    'data_inicio', 'data_final', 'data_vencimento', 'situacao', 'formacao', 'qualificacao', 'experiencia',
];

public $rules = [
    //'data.tipo_processo_id' => 'nullable|exists:residencia.tipo_processos,id',
    'data.tipo_processo_id' => 'nullable|exists:App\Models\Admin\Sesau\Residencia\TipoProcesso,id',
    //'data.cedente_id' => 'nullable|exists:residencia.cedentes,id',
    'data.cedente_id' => 'nullable|exists:App\Models\Admin\Sesau\Residencia\Cedente,id',
    'data.nome' => 'nullable|string|max:255',
    'data.descricao' => 'nullable|string|max:1000',
    'data.data_inicio' => 'nullable|date',
    'data.data_final' => 'nullable|date|after_or_equal:data.data_inicio',
    'data.data_vencimento' => 'nullable|date|after_or_equal:data.data_inicio',
    'data.situacao' => 'required|in:andamento,encerrado,cancelado',
    'data.formacao' => 'boolean',
    'data.qualificacao' => 'boolean',
    'data.experiencia' => 'boolean',
    'data.status' => 'boolean',
];


    public static function createdModel()
    {
        return [
            'tipo_processo_id' => 1,
            'cedente_id' => 1,
            'status' =>  true,
            'user_id' =>  Auth::user()->id,
        ];
    }

    public static function columns_modal_card()
    {
        return [
            Column::make('id')->searchable()->sortable(),
            Column::make('nome')->searchable()->sortable(),
            Column::make('action')->view('livewire.admin.card.action_modal_card'),
        ];
    }
    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtoupper($value);
    }

}
