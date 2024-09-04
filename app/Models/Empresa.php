<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresa';

    public $timestamps = false;

    protected $fillable = [
            'razaosocial',
            'nomefantasia',
            'cnpj_cpf',
            'inscestadual',
            'inscricaoMunicipal',
            'cep',
            'logradouro',
            'numero',
            'complemento',
            'bairro',
            'pais_cod',
            'uf_cod',
            'telefone',
            'email',
            'municipio_cod',
    ];

    public function TipoUf()
    {
        return $this->belongsTo(tipoUf::class, 'uf_cod', 'num_uf');
    }
}
