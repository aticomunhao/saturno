<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCatalogoMaterial extends Model
{
    public $timestamps = false;
    protected $table = "item_catalogo_material";
    protected $fillable = [
        'nome',
        'id_categoria_material',
        'composicao',
        'ativo',
    ];

}
