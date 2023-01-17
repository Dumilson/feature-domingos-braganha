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

    public function createCep(array $data){
        return $this->create($data);
    }

    public function updateCep(int $id, array $data){
        return $this->where('id_cep_pk', $id)->update($data);
    }

    public function getCep(int $id){
        return $this->where('id_cep_pk', $id)->first();
    }
}
