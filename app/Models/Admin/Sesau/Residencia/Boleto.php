<?php

namespace App\Models\Admin\Sesau\Residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    use HasFactory;
    protected $table = 'residencia.boletos';
    protected $fillable = ['inscricao_id', 'numero_titulo_cliente', 'corpo', 'boleto' ];

    protected $casts = [
        'corpo' => 'array', // Converte JSON em array associativo
        'boleto' => 'array',
    ];

    public function Inscricao()
    {
        return $this->belongsTo(Inscricao::class);
    }

}
