<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolMaterial extends Model
{
    use HasFactory;

    protected $table = 'sol_material';

    protected $fillable = [
        'id_tipo_material',
        'observacao',
        'data_cadastro',
        'status',
        'id_setor',
        'prioridade',
    ];

    public function tipoMaterial()
    {
        return $this->belongsTo(TipoMaterial::class, 'id_tipo_material');
    }

    public function tipoStatus()
    {
        return $this->belongsTo(TipoStatusSolMt::class, 'status');
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'id_setor');
    }

    public $timestamps = false;
}
