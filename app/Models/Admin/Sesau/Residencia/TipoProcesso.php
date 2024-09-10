<?php

namespace App\Models\Admin\Sesau\Residencia;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Kdion4891\LaravelLivewireTables\Column;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TipoProcesso extends Model
{
    use HasFactory;
    protected $table= "residencia.tipo_processos";
    protected $fillable = ['nome', 'user_id', 'status'];
    //'residencia_familia_comunidade', 'residencia_psiquiatria', 'residencia_multiprofissional_saude_familia', 'residencia_multiprofissional_saude_mental',

    public $rules=[
        'data.nome'=> 'required',
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
            Column::make('status')->searchable()->sortable(),
            Column::make('action')->view('livewire.admin.crud.table.actions-gestor'),
        ];
    }

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtoupper($value);
    }

}
