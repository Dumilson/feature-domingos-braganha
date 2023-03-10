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

    public function index(){
        $data = $this->pessoa->getAllPessoa();
        return view("pages.index", compact('data'));
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
        try{
            DB::beginTransaction();
            $pessoa = $this->pessoa->createPessoa(["nome_pessoa" => $createPessoaRequest->nome_pessoa]);
            $cep_verify = $this->cep->getCep($createPessoaRequest->cep);
            if(!$cep_verify){
                $cep = $this->cep->createCep($createPessoaRequest->except('nome_pessoa'));
                $cep_id = $cep->id;
            }else{
                $cep_id = $cep_verify->id_cep_pk;
            }
            $this->endereco->createEndereco(["cep_fk" => $cep_id, "pessoa_fk" => $pessoa->id]);
            DB::commit();
            return redirect()->back()->with('success', "Pessoa cadastrada com sucesso");
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors("Erro ao fazer o cadastro");
        }
    }

}
