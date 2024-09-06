<?php

namespace App\Models\admin\sesau\residencia;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Kdion4891\LaravelLivewireTables\Column;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cedente extends Model
{
    use HasFactory;

    protected $table = 'residencia.cedentes';

    protected $fillable = ['nome', 'cnpj', 'endereco', 'banco', 'agencia', 'conta_corrente', 'numero_convenio', 'nosso_numero'];

    public $rules=[
        'data.nome' => 'required|string|max:255',
        //'data.cnpj' => 'nullable|string|max:18|regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/', // Valida formato de CNPJ
        'data.endereco' => 'nullable|string|max:255',
        'data.banco' => 'nullable|string|max:100',
        'data.agencia' => 'nullable|string|max:10',
        'data.conta_corrente' => 'nullable|string|max:20',
        'data.numero_convenio' => 'nullable|string|max:50',
        'data.nosso_numero' => 'nullable|string|max:50',
        'data.status' => 'boolean',
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
            Column::make('nome')->searchable()->sortable(),
            Column::make('cnpj')->searchable()->sortable(),
            Column::make('banco')->searchable()->sortable(),
            Column::make('agencia')->searchable()->sortable(),
            Column::make('conta_corrente')->searchable()->sortable(),
            Column::make('numero_convenio')->searchable()->sortable(),
            Column::make('nosso_numero')->searchable()->sortable(),
            Column::make('action')->view('livewire.admin.crud.table.actions'),
        ];
    }
    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtoupper($value);
    }

}
