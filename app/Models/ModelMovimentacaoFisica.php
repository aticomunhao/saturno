<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelMovimentacaoFisica extends Model
{
    public $timestamps = false;
    protected $table = 'movimentacao_fisica';
    protected $fillable = [
    'id_item_material',
    'id_cadastro_inicial',
    'id_remetente',
    'id_destinatario',
    'data',
    'id_deposito_origem',
    'id_deposito_destino',
    'id_tp_movimento',

    ];
}
