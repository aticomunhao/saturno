<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCidade extends Model
{
    use HasFactory;

    protected $table = 'tp_cidade';

    protected $connection = 'pgsql2';
   
    public function tipoUf()
    {
        return $this->belongsTo(TipoUf::class, 'id_uf');
    }

}
