<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUf extends Model
{
    use HasFactory;

    protected $table = 'tp_uf';

    protected $connection = 'pgsql2';

    public function tipoCidades()
    {
        return $this->hasMany(TipoCidade::class, 'id_uf');
    }
}
