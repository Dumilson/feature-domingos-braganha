<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cep extends Model
{
    use HasFactory;
    protected  $table = "tb_cep";
    public $timestamps = false;
    protected $fillable = [
        'id_cep_pk',
        'cep',
        'endereco',
        'localidade',
        'bairro'
    ];

}
