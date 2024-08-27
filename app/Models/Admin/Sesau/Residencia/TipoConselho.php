<?php

namespace App\Models\admin\sesau\residencia;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Kdion4891\LaravelLivewireTables\Column;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoConselho extends Model
{
    use HasFactory;

    protected $table='residencia.tipo_conselhos';

    protected $fillable = ['nome', 'status'];

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
            Column::make('action')->view('livewire.admin.card.action_modal_card'),
        ];
    }

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtoupper($value);
    }
}
