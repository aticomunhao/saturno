<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelItemCatalogoMaterial extends Model
{
    public $timestamps = false;
    protected $table = "item_catalogo_material";
    protected $fillable = [
        'nome',
        'id_categoria_material',
        'composicao',
        'ativo',
    ];
    public function tipoCategoriaMt()
    {
        return $this->belongsTo(ModelTipoCategoriaMt::class, 'id_cl_mt');
    }
}
