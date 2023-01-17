<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected  $table = "tb_pessoa";
    public $timestamps = false;

    protected $fillable = [
        'id_pessoa_pk',
        'nome_pessoa'
    ];

    public function createPessoa(array $data){
        return $this->create($data);
    }

    public function getAllPessoa(){
        return $this->paginate(10);
    }

    public function updatePessoa(int $id, array $data){
        return $this->where('id_pessoa_pk', $id)->update($data);
    }

    public function getPessoa(int $id){
        return $this->where('id_pessoa_pk', $id)->first();
    }
}
