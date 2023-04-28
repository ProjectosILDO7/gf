<?php

namespace App\Repositories\Comparticipacao;

use App\Models\Comparticipacao;
use Illuminate\Support\Facades\Auth;

class comparticipacaoRepository
{

    protected $ententy;
    protected $userID;

    public function __construct(Comparticipacao $compart)
    {
        $this->ententy = $compart;
        $this->userID = Auth()->user()->id;
    }

    public function getComparticipacaos()
    {
        $comparticipacao = $this->ententy::orderBy('cobranca', 'asc')->where('user_id', $this->userID)->get();
        if (asset($comparticipacao)) {
            return response()->json($comparticipacao);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Não foi possível carregar...!'
            ], 401);
        }
    }

    public function create($data)
    {
        $consulta=$this->ententy::all();
        if(count($consulta)==0){
            $saveComparticipacao = $this->ententy::create([
                'user_id' => $this->userID,
                'cobranca' => $data->cobranca
            ]);
    
            if (asset($saveComparticipacao)) {
                return response()->json([
                    'status' => 'Sucesso',
                    'Multas' => $saveComparticipacao,
                ], 200);
            } else {
                return response()->json([
                    'status' => 'Erro',
                    'message' => 'Nao foi possível cadastrar... deve-se a um problema interno.!'
                ], 401);
            }
        }else{
            return response()->json([
                'errors' => ['cobranca'=>'Já fez o registo de comparticipação...!'],
            ], 422); 
        }
        
    }

    public function getComparticipacao($id)
    {
        //dd($id);
        $getComparticipacao = $this->ententy::find($id);

        if (asset($getComparticipacao)) {
            return response()->json([
                'getComparticipacao' => $getComparticipacao
            ], 200);
        } else {
            return response()->json([
                'message' => 'Confirmação não encontrada..!'
            ], 401);
        }
    }

    public function updateComparticipacao($request, $id)
    {
        $updateComparticipacao = $this->ententy::find($id);
        
        $data = $request->only('cobranca');

        $updateComparticipacao->update($data);


        if (asset($updateComparticipacao)) {
            return response()->json(['message' => 'Confirmação actualizada com sucesso'], 200);
        } else {
            return response()->json(['Erro' => 'Não foi possível actualizar...!'], 401);
        }
    }

    public function apagar($id)
    {

        $deleteComparticipacao = $this->ententy::find($id);
        $deleteComparticipacao->delete();

        if (asset($deleteComparticipacao)) {
            return response()->json(['message' => 'Valor da comparticipação apagada com sucesso'], 200);
        } else {
            return response()->json(['erro' => 'Não foi possível apagar...!'], 401);
        }
    }

    public function detalhes($id)
    {
        $detalhes = $this->ententy::find($id);
        if (asset($detalhes)) {
            return response()->json($detalhes);
        } else {
            return response()->json(['erro' => 'Não foi possível carregar os detalhes']);
        }
    }

}
