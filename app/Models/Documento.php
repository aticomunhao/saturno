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
        'dt_doc',
        'id_tp_doc',
        'valor',
        'id_empresa',
        'id_setor',
        'vencedor_inicial',
        'id_sol_sv',
        'mat_proposta',
        'dt_validade',
        'end_arquivo',
        'numero',
        'tempo_garantia_dias',
        'vencedor_geral',
        'link_proposta',
        'id_sol_mat',
    ];

    public $timestamps = false;

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa' );
    }
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'id_tp_doc');
    }
    public function matProposta()
    {
        return $this->belongsTo( MatProposta::class,'mat_proposta');
    }
}
