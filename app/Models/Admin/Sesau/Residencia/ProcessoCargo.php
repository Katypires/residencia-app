<?php

namespace App\Models\admin\sesau\residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessoCargo extends Model
{
    use HasFactory;

    protected $table='residencia.processo_cargos';

    protected $fillable = ['processo_id', 'status'];

    public $rules=[
        'nome'=> 'required',
    ];
}
