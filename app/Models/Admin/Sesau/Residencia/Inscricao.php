<?php

namespace App\Models\Admin\Sesau\Residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Sesau\Residencia\Candidato;
use App\Models\Admin\Sesau\Residencia\Processo;
use App\Models\Admin\Sesau\Residencia\Formulario;

class Inscricao extends Model
{
    use HasFactory;
    protected $table = 'residencia.inscricoes';
    protected $fillable = ['processo_id', 'candidato_id', 'formulario_id', 'boleto', 'pagamento', 'key', 'status'];
    public $rules=[
        // 'boleto'=> 'required',
        'candidato_id' => 'required',
    ];

    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'candidato_id');
    }

    public function processo()
    {
        return $this->belongsTo(Processo::class, 'processo_id');
    }

    public function formulario()
    {
        return $this->belongsTo(Formulario::class, 'formulario_id');
    }
}