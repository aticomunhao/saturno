<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCatalogoContaContabil extends Model
{
    protected $table = "tipo_catalogo_conta_contabil";
    protected $fillable = ["nome"];
    public $timestamps = false;

    public function conta_contabil()
    {
        return $this->hasMany(ContaContabil::class, "tipo_catalogo_conta_contabil", "id");
    }
}
