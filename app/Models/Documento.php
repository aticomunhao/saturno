<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class
Documento extends Model
{
    use HasFactory;

    protected $table = "documento";

    protected $fillable = [
        'numero',
        'dt_doc',
        'id_tp_doc',
        'valor',
        'id_empresa',
        'id_setor',
        'vencedor',
        'id_sol_sv',
        'is_sol_mat',
        'dt_validade',
        'end_arquivo',
    ];

    public $timestamps = false;

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id');
    }
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'id_tp_doc');
    }
}
