<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolServico extends Model
{
    use HasFactory;

    protected $table = 'sol_servico';

    protected $fillable = [
        'id_classe_sv',
        'id_tp_sv',
        'motivo',
        'data',
        'status',
        'id_setor',
        'prioridade',
        'aut_usu_adm',
        'dt_usu_adm',
        'id_setor_resp_sv',
        'is_resp_sv',
    ];

    public function tipoClasse()
    {
        return $this->belongsTo(TipoClasseSv::class, 'id_classe_sv');
    }

    public function catalogoServico()
    {
        return $this->belongsTo(CatalogoServico::class, 'id_tp_sv');
    }

    public function tipoStatus()
    {
        return $this->belongsTo(TipoStatusSolSv::class, 'status');
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'id_setor');
    }
    public function respSetor()
    {
        return $this->belongsTo(Setor::class, 'id_setor_resp_sv');
    }

    public $timestamps = false;
}
