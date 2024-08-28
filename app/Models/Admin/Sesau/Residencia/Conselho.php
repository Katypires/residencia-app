<?php

namespace App\Models\admin\sesau\residencia;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Kdion4891\LaravelLivewireTables\Column;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conselho extends Model
{
    use HasFactory;

    protected $table = 'residencia.conselhos';

    protected $fillable = ['tipo_conselho_id', 'numero'];

    public $rules = [
        // 'data.tipo_conselho_id' => 'nullable|exists:residencia.tipo_conselhos,id',
        'data.numero' => 'required|string|max:255',
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
            Column::make('tipo_conselho_id')->searchable()->sortable(),
            Column::make('numero')->searchable()->sortable(),
            Column::make('action')->view('livewire.admin.crud.table.actions'),
        ];
    }


}
