<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPessoa extends Model
{
    protected $table ='pessoas';

    protected $connection = 'pgsql2';

}
