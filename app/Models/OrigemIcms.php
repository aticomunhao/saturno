<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrigemIcms extends Model
{
    protected $table = 'tipo_origem_icms';

    protected $fillable = [
        'id',
        'tipo',
        'descricao',
    ];

    public $timestamps = false;}
