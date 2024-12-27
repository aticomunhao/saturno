<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoClasseContaContabil extends Model
{
    protected $table = "tipo_classe_conta_contabil";
    protected $fillable = ["nome"];
    public $timestamps = false;
    public function conta_contabil(){
        return $this->hasMany(ContaContabil::class,"tipo_classe_conta_contabil","id");
    }
}
