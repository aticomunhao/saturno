<?php

namespace App\Models;

use Dom\Document;
use Illuminate\Database\Eloquent\Model;

class CadastroInicial extends Model
{
    public $timestamps = false;

    protected $table = 'cadastro_inicial';

    public function Status()
    {
        return $this->belongsTo(StatusCadastroInicial::class, 'id_tp_status');
    }
    public function SolOrigem()
    {
        return $this->belongsTo(SolMaterial::class, 'id_sol_origem');
    }
    public function DocOrigem()
    {
        return $this->belongsTo(Documento::class, 'documento_origem');
    }
    public function Deposito()
    {
        return $this->belongsTo(DepositoMaterial::class, 'id_deposito');
    }
    public function Destinacao()
    {
        return $this->belongsTo(Destinacao::class, 'id_destinacao');
    }
    public function CategoriaMaterial()
    {
        return $this->belongsTo(ModelCatMaterial::class, 'id_cat_material');
    }
    public function ItemCatalogoMaterial()
    {
        return $this->belongsTo(ItemCatalogoMaterial::class, 'id_nome_mat');
    }
    public function TipoMaterial()
    {
        return $this->belongsTo(ModelTipoMaterial::class, 'id_tipo_material');
    }

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
        'id_modelo',
        'avariado',
        'aplicacao',
        'id_sol_origem',
        'id_cat_material',
        'componente',
        'id_nome_mat',
    ];
}
