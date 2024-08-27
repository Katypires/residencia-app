<?php

namespace App\Models\admin\sesau\residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessoVaga extends Model
{
    use HasFactory;

    protected $table = 'residencia.processo_vagas';

    protected $fillable = ['processo_id', 'nome', 'descricao', 'imagem', 'valor', 'reserva', 'vagas', 'status'];

    public $rules=[
        'nome'=> 'required',
    ];
}

