<?php

namespace App\Models\Admin\Sesau\Residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Sesau\Residencia\Candidato;
use App\Models\Admin\Sesau\Residencia\Processo;
use App\Models\Admin\Sesau\Residencia\ProcessoVaga;
use App\Models\User;
use Kdion4891\LaravelLivewireTables\Column;

class Formulario extends Model 
{
    use HasFactory;

    protected $table = 'residencia.formularios';

    protected $fillable = [
        'candidato_id', 'processo_id', 'processo_vaga_id','processo_tipo_vaga_id', 'tipo_vaga', 'leitura_edital',
        'termo_aceitacao', 'solicitacao_isencao', 'documento_ampla_concorrencia', 
        'documento_solicitacao_isencao', 'key', 'status'
    ];

    public $rules = [
        'data.termo_aceitacao' => 'required',
    ];

    // Definição dos relacionamentos
    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'candidato_id');
    }

    public function processo()
    {
        return $this->belongsTo(Processo::class, 'processo_id');
    }

    public function processoVaga()
    {
        return $this->belongsTo(ProcessoVaga::class, 'processo_vaga_id');
    }

    public function processoTipoVaga()
    {
        return $this->belongsTo(ProcessoTipoVaga::class, 'processo_tipo_vaga_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public static function columns()
    {
        return [
            Column::make('ID')->searchable()->sortable(),
            Column::make('Nome do Candidato', 'candidato.nome')->searchable()->sortable(),
            Column::make('Tipo da Vaga', 'tipo_vaga')->searchable()->sortable(),
            Column::make('Ações')->view('livewire.admin.crud.table.actions'),
        ];
    }
}
