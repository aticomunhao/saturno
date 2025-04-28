<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelEmbalagem extends Model
{
    protected $table = 'embalagem';

    public $timestamps = false;

    protected $fillable = [
        'id_item_catalogo',
        'id_un_med_n1',
        'qtde_n1',
        'id_un_med_n2',
        'qtde_n2',
        'id_un_med_n3',
        'qtde_n3',
        'id_un_med_n4',
        'qtde_n4',
        'peso',
        'altura',
        'largura',
        'comprimento',
        'id_tp_material',
    ];
}
