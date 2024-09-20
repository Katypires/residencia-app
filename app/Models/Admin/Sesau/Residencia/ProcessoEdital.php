<?php

namespace App\Models\admin\sesau\residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kdion4891\LaravelLivewireTables\Column;

class ProcessoEdital extends Model
{
    use HasFactory;

    protected $table = 'residencia.processo_editais';

    protected $fillable = ['nome', 'processo_id', 'arquivo', 'status'];

    public $rules=[
        'data.nome'=> 'required',
        'data.arquivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
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

    public function Processo()
    {
        return $this->belongsTo(Processo::class);
    }

}
