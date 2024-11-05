<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catalogoMaterial extends Model
{
    use HasFactory;
    protected $table = 'catalogo_material';
    public function tipoClasseMt()
    {
        return $this->belongsTo(TipoClasseMt::class, 'id_cl_mt');
    }
    public function SolMaterial()
    {
        return $this->hasMany( SolMaterial::class,'id_tp_mt');
    }

    protected $fillable = [
        'id_cl_mt',
        'descricao',
        'situacao'
    ];
    public $timestamps = false;
}
