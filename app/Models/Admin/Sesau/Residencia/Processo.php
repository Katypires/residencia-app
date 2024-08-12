<?php

namespace App\Models\Admin\Sesau\Residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    use HasFactory;
    protected $table='residencia.processo';
    protected $fillable = ['tipo_processo_id', 'nome', 'descricao', 'valor', 'imagem', 'status',];
    public $rules=[
        'nome'=> 'required',
    ];
}