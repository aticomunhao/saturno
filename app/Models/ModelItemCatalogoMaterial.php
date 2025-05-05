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
        'tp_unidade_medida',
        'valor_minimo',
        'valor_medio',
        'valor_maximo',
        'valor_marca',
        'valor_etiqueta',
        'composicao',
        'id_tp_material',
    ];
    public function tipoCategoriaMt()
    {
        return $this->belongsTo(ModelTipoCategoriaMt::class, 'id_categoria_material');
    }
    public function embalagem()
    {
        return $this->hasMany(ModelEmbalagem::class, 'id_item_catalogo');
    }
}
