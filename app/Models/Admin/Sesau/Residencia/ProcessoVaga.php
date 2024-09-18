<?php

namespace App\Models\admin\sesau\residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kdion4891\LaravelLivewireTables\Column;

class ProcessoVaga extends Model
{
    use HasFactory;

    protected $table = 'residencia.processo_vagas';

    protected $fillable = ['processo_id', 'nome', 'descricao', 'imagem', 'valor', 'reserva', 'vagas', 'status'];

    public $rules=[
        'data.nome'=> 'required',
    ];

    public static function columns_modal_card()
    {
        return [
            Column::make('id')->searchable()->sortable(),
            Column::make('nome')->searchable()->sortable(),
            Column::make('processo_id')->searchable()->sortable(),
            Column::make('action')->view('livewire.admin.crud.table.actions-gestor'),
        ];
    }

    public function processo_tipo_vagas()
    {
        return $this->hasMany(ProcessoTipoVaga::class, 'processo_vaga_id', 'id');
    }

    public function Processo()
    {
        return $this->belongsTo(Processo::class);
    }
}

