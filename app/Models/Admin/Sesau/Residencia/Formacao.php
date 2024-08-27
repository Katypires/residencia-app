<?php

namespace App\Models\admin\sesau\residencia;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Kdion4891\LaravelLivewireTables\Column;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacao extends Model
{
    use HasFactory;
    protected $table = 'residencia.formacoes
';
    protected $fillable = ['candidato_id', 'tipo_formacao', 'instituicao', 'curso', 'exterior', 'pais', 'cidade', 'estado',
'tipo_duracao', 'duracao', 'data_conclusao', 'documento_pdf'];

    public $rules = [
        'data.candidato_id' => 'nullable|exists:residencia.candidatos,id',
        'data.tipo_formacao' => 'required|in:graduacao,especializacao,mestrado,doutorado',
        'data.instituicao' => 'nullable|string|max:255',
        'data.curso' => 'nullable|string|max:255',
        'data.exterior' => 'boolean',
        'data.pais' => 'nullable|string|max:255',
        'data.cidade' => 'nullable|string|max:255',
        'data.estado' => 'nullable|string|max:255',
        'data.tipo_duracao' => 'required|in:ano,semestre,meses',
        'data.duracao' => 'nullable|integer|min:1',
        'data.data_conclusao' => 'nullable|date',
        'data.documento_pdf' => 'nullable|file|mimes:pdf|max:2048',
    ];


    public static function createdModel()
    {
        return [
            'candidato_id' => 1,
            'tipo_formacao' => 1,
            'status' =>  true,
            'user_id' =>  Auth::user()->id,
        ];
    }

    public static function columns_modal_card()
    {
        return [
            Column::make('id')->searchable()->sortable(),
            Column::make('curso')->searchable()->sortable(),
            Column::make('pais')->searchable()->sortable(),
            Column::make('action')->view('livewire.admin.card.action_modal_card'),
        ];
    }
}
