<?php

namespace App\Models\admin\sesau\residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessoContato extends Model
{
    use HasFactory;

    protected $table = 'residencia.processo_contatos';

    protected $fillable = ['processo_id', 'nome', 'descricao', 'status'];

    public $rules=[
        'nome'=> 'required',
    ];
}
