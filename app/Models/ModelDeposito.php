<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelDeposito extends Model
{
    protected $table = 'deposito';
    public $timestamps = false;
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
        return $this->belongsTo(ModelTipoDeposito::class, 'id_tp_deposito');
    }

    public function sala()
    {
        return $this->belongsTo(ModelSala::class, 'id_sala');
    }
}
