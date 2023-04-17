<?php

namespace App\Repositories\Prova_atrasada;

use App\Models\Prova_atrasada;
use Illuminate\Support\Facades\Auth;

class provaAtrasadaRepository
{

    protected $ententy;
    protected $userID;

    public function __construct(Prova_atrasada $prova_atrasada)
    {
        $this->ententy = $prova_atrasada;
        $this->userID = Auth()->user()->id;
    }

    public function getProva_atrasadas()
    {
        $prova_atrasada = $this->ententy::with('disciplinas')->orderBy('cobranca', 'asc')->where('user_id', $this->userID)->get();
        if (asset($prova_atrasada)) {
            return response()->json($prova_atrasada);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Não foi possível carregar...!'
            ], 401);
        }
    }

    public function create($data)
    {

        //dd($data->all());
        $saveProva_atrasada = $this->ententy::create([
            'user_id' => $this->userID,
            'cobranca' => $data->cobranca
        ]);


        $saveProva_atrasada->disciplinas()->attach($data->cadeira);

        if (asset($saveProva_atrasada)) {
            return response()->json([
                'status' => 'Sucesso',
                'provas' => $saveProva_atrasada,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Nao foi possível cadastrar... deve-se a um problema interno.!'
            ], 401);
        }
    }

    public function getProva_atrasada($id)
    {
        //dd($id);
        $getProva_atrasada = $this->ententy::find($id);

        if (asset($getProva_atrasada)) {
            return response()->json([
                'getProva_atrasada' => $getProva_atrasada
            ], 200);
        } else {
            return response()->json([
                'message' => 'Não encontrada..!'
            ], 401);
        }
    }

    public function updateProva_atrasada($request, $id)
    {
        $updateProva_atrasada = $this->ententy::find($id);
        
        $data = $request->only('cobranca');

        if($request->disciplina_id){
            $updateProva_atrasada->disciplinas()->attach($request->cadeira);
        }

        $updateProva_atrasada->update($data);


        if (asset($updateProva_atrasada)) {
            return response()->json(['message' => 'Confirmação actualizada com sucesso'], 200);
        } else {
            return response()->json(['Erro' => 'Não foi possível actualizar...!'], 401);
        }
    }

    public function apagar($id)
    {

        $deleteProva_atrasada= $this->ententy::find($id);
        $deleteProva_atrasada->delete();

        if (asset($deleteProva_atrasada)) {
            return response()->json(['message' => 'Apagada com sucesso'], 200);
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
