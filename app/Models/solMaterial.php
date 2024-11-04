<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solMaterial extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sol_material';
    protected $fillable = [
        'id_classe_sv',
        'id_tp_sv',
        'motivo',
        'motivo_recusa',
        'data',
        'status',
        'id_setor',
        'prioridade',
        'id_resp_sv',
        'aut_usu_adm',
        'aut_usu_pres',
        'aut_usu_daf',
        'aut_usu_dir',
        'aut_usu_fin',
        'dt_usu_adm',
        'dt_usu_pres',
        'dt_usu_daf',
        'dt_usu_dir',
        'dt_usu_fin',
    ];
}
