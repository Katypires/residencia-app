<?php

namespace App\Models\admin\sesau\residencia;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Kdion4891\LaravelLivewireTables\Column;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;
    protected $table = 'residencia.experiencias';

    protected $fillable = ['candidato_id', 'curso', 'cargo_funcao', 'area_atuacao', 'data_inicio', 'data_saida'];

    public $rules = [
        // 'data.candidato_id' => 'nullable|exists:residencia.candidatos,id',
        'data.curso' => 'nullable|string|max:255',
        'data.cargo_funcao' => 'nullable|string|max:255',
        'data.area_atuacao' => 'nullable|string|max:255',
        'data.data_inicio' => 'nullable|date',
        'data.data_saida' => 'nullable|date|after_or_equal:data.data_inicio',
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
            Column::make('curso')->searchable()->sortable(),
            Column::make('cargo_funcao')->searchable()->sortable(),
            Column::make('action')->view('livewire.admin.crud.table.actions-gestor'),
        ];
    }
}
