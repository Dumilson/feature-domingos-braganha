<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePessoaRequest;
use App\Models\Cep;
use App\Models\Endereco;
use App\Models\Pessoa;
use App\Utils\CepApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{
    private  $endereco;
    private  $cep;
    private $pessoa;
    public function __construct(Endereco $endereco, Cep $cep, Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
        $this->cep = $cep;
        $this->endereco = $endereco;
    }

    public function getCepPessoa($cep = null){
        if(empty($cep)){
            return response()->json([
                'error' => true,
                'message' => 'Informe o CEP'
            ]);
        }

        $data = CepApi::getCep($cep);
        
        if(is_array($data)){
            return response()->json([
                'error' => false,
                'message' => $data
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => $data
        ]);

    }

    public function store(CreatePessoaRequest $createPessoaRequest){
        // dd($createPessoaRequest->all());
        try{
            DB::beginTransaction();
            $pessoa = $this->pessoa->createPessoa(["nome_pessoa" => $createPessoaRequest->nome_pessoa]);
            $cep_verify = $this->cep->getCep($createPessoaRequest->cep);
            if(!$cep_verify){
                $cep = $this->cep->createCep($createPessoaRequest->except('nome_pessoa'));
            }
            $this->endereco->createEndereco(["cep_fk" => $cep->id ?? $cep_verify, "pessoa_fk" => $pessoa->id]);
            DB::commit();
            return redirect()->back()->with('success', "Pessoa cadastrada com sucesso");
        }catch(\Exception $e){
            DB::rollback();
            dd($e->getMessage());

            return redirect()->back()->withErrors("Erro ao fazer o cadastro");
        }
    }

}
