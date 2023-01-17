<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    use HasFactory;
    protected  $table = "tb_endereco";
    public $timestamps = false;
    protected $fillable =  [
        'id_endereco_pk',
        'pessoa_fk',
        'cep_fk'
    ];

    public function createEndereco(array $data){
        return $this->create($data);
    }

    public function updateEndereco(int $id, array $data){
        return $this->where('pessoa_pk', $id)->update($data);
    }
}
