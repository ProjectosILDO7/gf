<?php

namespace App\Http\Controllers;

use App\Models\Assinatura;
use App\Models\totalPresenca;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

        $date = date("d-M-Y");

        $user_asign=Assinatura::where('user_id', $id)->where('data_assinatura', $date)->get();
       
        if(count($user_asign)==0){
         
          // DB::transaction();

           $assign=Assinatura::create([
                'user_id'=>$id,
                'data_assinatura'=>$date
            ]);
            
           // DB::commit();
            $mes=date('M');
            $ano=date('Y');
            $p=totalPresenca::where('assinatura_id', $id)->where('mes',$mes )->where('ano', $ano)->get();

            if(count($p)>=1){

                $val = $p->total+1;
                $registerTotal=totalPresenca::create([
                    'assinatura_id'=>$id,
                    'mes'=>$mes,
                    'ano'=>$ano,
                    'total'=>$val
                ]);

                if(isset($registerTotal)){
                    return response()->json([
                        'mensagem'=>'Presença registada com sucesso'
                    ], 200);
                }else{
                    return response()->json([
                        'Erro'=>'Não foi possível registar a presença'
                    ], 402);
                }
    
            }else{
                $val = 1;
                $registerTotal=totalPresenca::create([
                    'assinatura_id'=>$id,
                    'mes'=>$mes,
                    'ano'=>$ano,
                    'total'=>$val
                ]);

                if(isset($registerTotal)){
                    return response()->json([
                        'mensagem'=>'Presença registada com sucesso'
                    ], 200);
                }

            }

            

        }else{
            return response()->json([
                'mensagem'=>'Não é possível duplicar as assinaturas num só dia'
            ],422);
        }
    }
}
