<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValorCompra extends Model
{
    public $timestamps = false;
    protected $table = 'valor_max';
    protected $fillable = [
        'valor',
        'tipo_sol',
        'tipo_compra',
        'dt_inicio',
        'dt_fim',
    ];
}
