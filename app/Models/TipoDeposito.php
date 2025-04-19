<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDeposito extends Model
{
    protected $table = 'tipo_deposito';
    protected $fillable = [
        'nome',

    ];

    public $timestamp = false;
    public function depositos()
    {
        return $this->hasMany(Deposito::class, 'id_tp_deposito');
    }


}
