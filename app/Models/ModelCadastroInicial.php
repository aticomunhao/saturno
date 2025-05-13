<?php

namespace App\Models;

use Dom\Document;
use Illuminate\Database\Eloquent\Model;

class ModelCadastroInicial extends Model
{
    public $timestamps = false;

    protected $table = 'cadastro_inicial';

    protected $fillable = [
        'id_item_catalogo',
        'observacao',
        'data_cadastro',
        'quantidade',
        'adquirido',
        'valor_aquisicao',
        'id_marca',
        'id_tamanho',
        'id_cor',
        'id_tipo_material',
        'id_fase_etaria',
        'id_tp_sexo',
        'id_deposito',
        'data_validade',
        'id_tp_status',
        'id_loc_deposito',
        'id_destinacao',
        'documento_origem',
        'avariado',
        'aplicacao',
        'id_sol_origem',
        'id_cat_material',
        'componente',
        'id_embalagem',
        'modelo',
        'valor_venda',
        'part_number',
    ];

    public function Status()
    {
        return $this->belongsTo(ModelStatusCadastroInicial::class, 'id_tp_status');
    }
    public function SolOrigem()
    {
        return $this->belongsTo(ModelSolMaterial::class, 'id_sol_origem');
    }
    public function DocOrigem()
    {
        return $this->belongsTo(ModelDocumento::class, 'documento_origem');
    }
    public function Deposito()
    {
        return $this->belongsTo(ModelDepositoMaterial::class, 'id_deposito');
    }
    public function Destinacao()
    {
        return $this->belongsTo(ModelDestinacao::class, 'id_destinacao');
    }
    public function CategoriaMaterial()
    {
        return $this->belongsTo(ModelCatMaterial::class, 'id_cat_material');
    }
    public function ItemCatalogoMaterial()
    {
        return $this->belongsTo(ModelItemCatalogoMaterial::class, 'id_item_catalogo');
    }
    public function TipoMaterial()
    {
        return $this->belongsTo(ModelTipoMaterial::class, 'id_tipo_material');
    }
    public function Localizacao()
    {
        return $this->hasMany(ModelLocalizacaoCadastroInicial::class, 'id_cadastro_inicial');
    }
    public function Embalagem()
    {
        return $this->belongsTo(ModelEmbalagem::class, 'id_embalagem');
    }
}
