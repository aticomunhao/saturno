<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelMarca extends Model
{
    protected $table = 'marca';

    public function tipoMarca()
    {
        return $this->belongsTo(TipoCategoriaMt::class, 'id_categoria_material');
    }
}
