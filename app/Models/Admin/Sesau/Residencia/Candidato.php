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
    protected $fillable = ['nome', 'nome_social', 'celular', 'email', 'cpf', 'lattes', 'status'];

    public $rules=[
        'data.nome' => 'required|string|max:255',
        'data.nome_social' => 'nullable|string|max:255',
        'data.celular' => 'required|string|max:255',
        'data.email' => 'required|email|max:255',
        'data.cpf' => 'required|string|size:11|unique:App\Models\Admin\Sesau\Residencia\Candidato,cpf',  
        'data.status' => 'nullable|boolean',
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
            Column::make('action')->view('livewire.admin.crud.table.actions'),
        ];
    }
    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtoupper($value);
    }
}
