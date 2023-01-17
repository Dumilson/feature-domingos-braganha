<?php

namespace App\Http\Controllers;

use App\Utils\CepApi;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
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
    
}
