<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelSala extends Model
{
    protected $connection = 'pgsql2';
    protected $table = 'sala';
    protected $fillable = [
        'nome'
    ];
}
