<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSetor extends Model
{
    use HasFactory;

    protected $table = 'setor';

    protected $connection = 'pgsql2';
}
