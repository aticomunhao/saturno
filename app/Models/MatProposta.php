<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatProposta extends Model
{
    public $timestamps = false;

    protected $table = 'mat_proposta';

    protected $fillable = [
        'id_cat_material',
        'id_valor',
        'id_marca',
        'id_tamanho',
        'id_cor',
        'id_fase_etaria',
        'id_sexo',
        'dt_cadastro',
        'id_tipo_embalagem',
        'id_tipo_unidade_medida',
        'id_tipo_situacao',
        'id_tipo_item_catalogo',
        'id_sol_mat',
        'nome',
        'quantidade',
    ];

    public function tipoCategoria()
    {
        return $this->belongsTo(TipoCategoriaMt::class, 'id_cat_material');
    }
    public function tipoMarca()
    {
        return $this->belongsTo(ModelMarca::class, 'id_marca');
    }
    public function tipoTamanho()
    {
        return $this->belongsTo(ModelTamanho::class, 'id_tamanho');
    }
    public function tipoCor()
    {
        return $this->belongsTo(ModelCor::class, 'id_cor');
    }
    public function tipoFaseEtaria()
    {
        return $this->belongsTo(ModelFaseEtaria::class, 'id_fase_etaria');
    }
    public function tipoSexo()
    {
        return $this->belongsTo(ModelSexo::class, 'id_sexo');
    }
    public function tipoUnidadeMedida()
    {
        return $this->belongsTo(ModelUnidadeMedida::class, 'id_tipo_unidade_medida');
    }
}
