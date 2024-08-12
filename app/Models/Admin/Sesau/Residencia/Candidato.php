<?php

namespace App\Models\Admin\Sesau\Residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;
    protected $table = 'residencia.candidatos';
    protected $fillable = ['nome', 'nome_social', 'celular', 'email', 'cpf', 'status'];
    public $rules=[
        'nome'=> 'required',
    ];
}
    