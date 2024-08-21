<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AprovarServico extends Model
{
    use HasFactory;

    // Defina a tabela se o nome não for o plural da model
    protected $table = 'sol_servico';

    // Se a tabela usa chaves primárias incrementais, não precisa definir o $primaryKey
    // Caso contrário, defina como:
    // protected $primaryKey = 'id';

    // Defina os campos que podem ser preenchidos em massa
    protected $fillable = [
        'status', // outros campos que podem ser atualizados
        'motivo',
        // outros campos da tabela
    ];

    public $timestamps = false;
}
