<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoMaterial extends Model
{
    use HasFactory;
    protected $table = 'catalogo_material';
    public function tipoCategoriaMt()
    {
        return $this->belongsTo(TipoCategoriaMt::class, 'id_cl_mt');
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
