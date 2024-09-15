<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMaterial extends Model
{
    use HasFactory;

    protected $table = 'tipo_material';

    public function categoria()
    {
        return $this->belongsTo(TipoCategoriaMaterial::class, 'id_categoria_material');
    }
}
