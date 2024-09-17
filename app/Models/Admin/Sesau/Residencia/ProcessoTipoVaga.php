<?php

namespace App\Models\Admin\Sesau\Residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kdion4891\LaravelLivewireTables\Column;


class ProcessoTipoVaga extends Model
{
    use HasFactory;
    protected $table= "residencia.processo_tipo_vagas";
    protected $fillable = ['processo_vaga_id','nome', 'status'];
    //'residencia_familia_comunidade', 'residencia_psiquiatria', 'residencia_multiprofissional_saude_familia', 'residencia_multiprofissional_saude_mental',

    public $rules=[
        'data.nome'=> 'required',
    ];

    public static function createdModel()
    {
        return [
            'status' =>  true,
        ];
    }

    public function ProcessoVaga()
    {
        return $this->belongsTo(ProcessoVaga::class);
    }

    public static function columns_modal_card()
    {
        return [
            Column::make('id')->searchable()->sortable(),
            Column::make('nome')->searchable()->sortable(),
            Column::make('processo_vaga_id')->searchable()->sortable(),
            Column::make('status')->searchable()->sortable(),
            Column::make('action')->view('livewire.admin.crud.table.actions-gestor'),
        ];
    }

        public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtoupper($value);
    }
}
