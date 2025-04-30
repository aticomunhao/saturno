<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelLocalizacaoCadastroInicial extends Model
{
    public $timestamps = false;
    protected $table = 'localizacao_cadastro_inicial';
    protected $fillable = [
        'id',
        'id_usuario',
        'id_localizacao',
        'id_cadastro_inicial',
        'data_cadastro',
        'data_atualizacao'
    ];
}
