<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContaContabil extends Model
{
    protected $table = "conta_contabil";
    protected $fillable = [
        "data_inicio",
        "data_fim",
        "id_tipo_catalogo",
        "descricao",
        "id_tipo_natureza_conta_contabil",
        "id_tipo_grupo_conta_contabil",
        "id_tipo_classe_conta_contabil",
        "nivel_1",
        "nivel_2",
        "nivel_3",
        "nivel_4",
        "nivel_5",
        "nivel_6",
        "grau"
    ];
    public $timestamps = false;

    public function natureza_contabil()
    {
        return $this->belongsTo(
            TipoNaturezaContaContabil::class,
            "id_tipo_natureza_conta_contabil",
            "id"
        );
    }

    public function catalogo_contabil()
    {
        return $this->belongsTo(
            TipoCatalogoContaContabil::class,
            'id_tipo_catalogo',
            'id'
        );
    }

    public function grupo_contabil()
    {
        return $this->belongsTo(
            TipoGrupoContaContabil::class,
            'id_tipo_grupo_conta_contabil',
            'id'
        );
    }

    public function classe_contabil()
    {
        return $this->belongsTo(
            TipoClasseContaContabil::class,
            'id_tipo_classe_conta_contabil',
            'id'
        );
    }
    // Getters

    public function getConcatenatedLevelsAttribute()
    {
        $niveis = [
            $this->nivel_1,
            $this->nivel_2,
            $this->nivel_3,
            $this->nivel_4,
            $this->nivel_5,
            $this->nivel_6,
        ];

        $result = [];
        foreach ($niveis as $nivel) {
            if ($nivel != 0) {
                $result[] = $nivel;
            } else {
                break;
            }
        }

        return implode('.', $result);
    }
}
