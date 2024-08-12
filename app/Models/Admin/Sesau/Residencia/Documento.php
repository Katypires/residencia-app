<?php

namespace App\Models\Admin\Sesau\Residencia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\User;

class Documento extends Model
{
    use HasFactory;
    protected $table = 'residencia.documentos';
    protected $fillable = ['user_id', 'nome'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}