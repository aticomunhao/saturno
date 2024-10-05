<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoClasseSv extends Model
{
    use HasFactory;

    protected $table = 'tipo_classe_sv';
    public $timestamps = false;

    public function catalogoServico()
    {
        return $this->hasMany(CatalogoServico::class, 'id_cl_sv');
    }
    public function SolServico()
    {
        return $this->hasMany( SolServico::class,'id_classe_sv');
    }

    protected $fillable = [
        'descricao',
        'sigla',
    ];
}
