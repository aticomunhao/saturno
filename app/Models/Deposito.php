<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    protected $table = 'deposito';
    protected $fillable = [
        'nome',
        'sigla',
        'id_tp_deposito',
        'ativo',
        'id_sala',
        'capacidade_volume',
        'comprimento',
        'largura',
        'altura',
        'altura_porta',
        'largura_porta',
    ];

    public function tipoDeposito()
    {
        return $this->belongsTo(TipoDeposito::class, 'id_tp_deposito');
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'id_sala');
    }
}
