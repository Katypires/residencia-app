<?php

namespace App\Models\Admin\Sesau\Residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
{
    use HasFactory;
    protected $table = 'residencia.residencia';
    protected $fillable = ['nome', 'descricao', 'data_inicial', 'data_final', 'imagem', 'status'];
    public $rules=[
        'nome'=> 'required',
    ];

}   