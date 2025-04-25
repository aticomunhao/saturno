<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelSala extends Model
{
    protected $connection = 'pgsql2';
    protected $table = 'salas';
    protected $fillable = [
        'nome',
        'numero'
    ];
}
