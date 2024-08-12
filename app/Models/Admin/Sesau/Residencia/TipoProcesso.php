<?php

namespace App\Models\Admin\Sesau\Residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TipoProcesso extends Model
{
    use HasFactory;
    protected $table= "residencia.tipo_processos";
    protected $fillable = ['nome', 'residencia_familia_comunidade', 'residencia_psiquiatria', 'residencia_multiprofissional_saude_familia', 'residencia_multiprofissional_saude_mental','user_id', 'status'];
    public $rules=[
        'nome'=> 'required',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}