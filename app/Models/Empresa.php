<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresa';

    public $timestamps = false;

    public function TipoUf()
    {
        return $this->belongsTo(tipoUf::class, 'uf_cod', 'num_uf');
    }
}
