<?php

namespace App\Http\Controllers;

use App\Models\Assinatura;
use App\Models\User;

class serachFuncionariosPresenca extends Controller
{
    //
    public function pesquisar($search){
        $user=User::with('departamentos')->where('name', $search)->where('status', '!=', '1')->get();
        if(isset($user)){
            return response()->json([
                'user'=>$user
            ],200);
        }else{
            return response()->json([
                'erro'=>'Não foi possível localizar este Funcionário(a)'
            ],422);
        }
        
    }

    public function assinatura($id){
        $date = now();
        $user_asign=Assinatura::where('user_id', $id)->where('data_assinatura', $date)->get();
    }
}
