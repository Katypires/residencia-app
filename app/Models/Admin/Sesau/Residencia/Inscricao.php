<?php

namespace App\Models\Admin\Sesau\Residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;
    protected $table = 'residencia.inscricao';
    protected $fillable = ['processo_id', 'candidato_id', 'formulario_id', 'boleto', 'pagamento', 'key', 'status'];
    public $rules=[
        'boleto'=> 'required',
    ];

    // public function processo()
    // {
    //     return $this->belongsTo(Processo::class);
    // }
}