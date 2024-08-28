<?php

namespace App\Models\admin\sesau\residencia;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Kdion4891\LaravelLivewireTables\Column;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualificacao extends Model
{
    use HasFactory;
    protected $table = 'residencia.qualificacoes';

    protected $fillable = ['candidato_id', 'instituicao', 'curso', 'exterior', 'pais', 'cidade', 'estado',
    'carga_horario', 'data_inicio', 'data_conclusao', 'documento_pdf'];

    public $rules = [
        // 'data.candidato_id' => 'nullable|exists:residencia.candidatos,id',
        'data.instituicao' => 'nullable|string|max:255',
        'data.curso' => 'nullable|string|max:255',
        'data.exterior' => 'boolean',
        'data.pais' => 'nullable|string|max:255',
        'data.cidade' => 'nullable|string|max:255',
        'data.estado' => 'nullable|string|max:255',
        'data.carga_horario' => 'nullable|integer|min:1',
        'data.data_inicio' => 'nullable|date',
        'data.data_conclusao' => 'nullable|date',
        'data.documento_pdf' => 'nullable|file|mimes:pdf|max:2048',
    ];


    public static function createdModel()
    {
        return [
            'status' =>  true,
            'user_id' =>  Auth::user()->id,
        ];
    }

    public static function columns_modal_card()
    {
        return [
            Column::make('id')->searchable()->sortable(),
            Column::make('instituicao')->searchable()->sortable(),
            Column::make('curso')->searchable()->sortable(),
            Column::make('action')->view('livewire.admin.crud.table.actions'),
        ];
    }
}
