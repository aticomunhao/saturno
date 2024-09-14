<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $table = 'tipo_documento';
    protected $fillable = [
        'descricao',
        'sigla'
    ];
    public $timestamps = false;

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'id_tp_doc');
    }
}
