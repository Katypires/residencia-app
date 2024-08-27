<?php

namespace App\Models\admin\sesau\residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessoEdital extends Model
{
    use HasFactory;

    protected $table = 'residencia.processo_editais';

    protected $fillable = ['nome', 'processo_id', 'arquivo', 'status'];

    public $rules=[
        'nome'=> 'required',
    ];
}
