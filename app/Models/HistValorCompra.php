<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistValorCompra extends Model
{
    public $timestamps = false;
    protected $table = 'hist_valor_autorizacao_compra';
    protected $fillable = [
        'id_valor_autorizacao_compra',
        'id_funcionario',
        'id_motivo',
    ];
}
