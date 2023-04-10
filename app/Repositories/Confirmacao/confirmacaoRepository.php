<?php

namespace App\Repositories\Confirmacao;

use App\Models\Confirmacao;
use Illuminate\Support\Facades\Auth;

class confirmacaoRepository
{

    protected $ententy;
    protected $userID;

    public function __construct(Confirmacao $confirmacao)
    {
        $this->ententy = $confirmacao;
        $this->userID = Auth()->user()->id;
    }

    public function getConfirmacaos()
    {
        $confirmacao = $this->ententy::with('graduacoes')->orderBy('cobranca', 'asc')->where('user_id', $this->userID)->get();
        if (asset($confirmacao)) {
            return response()->json($confirmacao);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Não foi possível carregar...!'
            ], 401);
        }
    }

    public function create($data)
    {

        $saveConfirmacao = $this->ententy::create([
            'user_id' => $this->userID,
            'cobranca' => $data->cobranca
        ]);


        $saveConfirmacao->graduacoes()->attach($data->graduacao_id);

        if (asset($saveConfirmacao)) {
            return response()->json([
                'status' => 'Sucesso',
                'Multas' => $saveConfirmacao,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Nao foi possível cadastrar... deve-se a um problema interno.!'
            ], 401);
        }
    }

    public function getConfirmacao($id)
    {
        //dd($id);
        $getConfirmacao = $this->ententy::find($id);

        if (asset($getConfirmacao)) {
            return response()->json([
                'getMulta' => $getConfirmacao
            ], 200);
        } else {
            return response()->json([
                'message' => 'Confirmação não encontrada..!'
            ], 401);
        }
    }

    public function updateConfirmacao($request, $id)
    {
        $updateConfirmacao = $this->ententy::find($id);
        
        $data = $request->only('cobranca');

        if($data->graduacao_id){
            $updateConfirmacao->graduacoes()->attach($request->graduacao_id);
        }
        $updateConfirmacao->update($data);


        if (asset($updateConfirmacao)) {
            return response()->json(['message' => 'Confirmação actualizada com sucesso'], 200);
        } else {
            return response()->json(['Erro' => 'Não foi possível actualizar...!'], 401);
        }
    }

    public function apagar($id)
    {

        $deleteConfirmacao = $this->ententy::find($id);
        $deleteConfirmacao->delete();

        if (asset($deleteConfirmacao)) {
            return response()->json(['message' => 'Confirmação apagada com sucesso'], 200);
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
