<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoServico extends Model
{
    use HasFactory;

    protected $table = 'catalogo_servico';

    public function tipoClasseSv()
    {
        return $this->belongsTo(TipoClasseSv::class, 'id_cl_sv');
    }

    protected $fillable = [
        'id_cl_sv',
        'descricao',
    ];
    public $timestamps = false;
}
