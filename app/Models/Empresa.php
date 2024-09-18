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
            'inscmunicipal',
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
        return $this->belongsTo(tipoUf::class, 'uf_cod');
    }

    public function TipoCidade()
    {
        return $this->belongsTo(tipoCidade::class, 'municipio_cod', 'id_cidade');
    }

    public function TipoPais()
    {
        return $this->belongsTo(tipoPais::class, 'pais_cod');
    }

    public function documento()
{
    return $this->hasMany(Documento::class, 'id_empresa', 'id');
}
}
