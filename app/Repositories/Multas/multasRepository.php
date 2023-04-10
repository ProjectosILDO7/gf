<?php

namespace App\Repositories\Multas;

use App\Models\Multa;
use Illuminate\Support\Facades\Auth;

class multasRepository
{

    protected $ententy;
    protected $userID;

    public function __construct(Multa $multa)
    {
        $this->ententy = $multa;
        $this->userID = Auth()->user()->id;
    }

    public function getMultas()
    {
        $multas = $this->ententy::with('cursos')->orderBy('cobranca', 'asc')->where('user_id', $this->userID)->get();
        if (asset($multas)) {
            return response()->json($multas);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Não foi possível carregar...!'
            ], 401);
        }
    }

    public function create($data)
    {

        $saveMultas = $this->ententy::create([
            'user_id' => $this->userID,
            'cobranca' => $data['cobranca']
        ]);


        $saveMultas->cursos()->attach($data->curso_id);

        if (asset($saveMultas)) {
            return response()->json([
                'status' => 'Sucesso',
                'Multas' => $saveMultas,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Nao foi possível cadastrar... deve-se a um problema interno.!'
            ], 401);
        }
    }

    public function getMulta($id)
    {
        //dd($id);
        $getMulta = $this->ententy::find($id);

        if (asset($getMulta)) {
            return response()->json([
                'getMulta' => $getMulta
            ], 200);
        } else {
            return response()->json([
                'message' => 'Multa não encontrada..!'
            ], 401);
        }
    }

    public function updateMulta($request, $id)
    {
        $updateMulta = $this->ententy::find($id);


        $data = $request->only('cobranca');
        if($request->curso_id){
            $updateMulta->cursos()->sync($request->curso_id);
        }
        $updateMulta->update($data);


        if (asset($updateMulta)) {
            return response()->json(['message' => 'Informação de multa actualizado com sucesso'], 200);
        } else {
            return response()->json(['Erro' => 'Não foi possível actualizar...!'], 401);
        }
    }

    public function apagar($id)
    {

        $deleteMulta = $this->ententy::find($id);
        $deleteMulta->delete();

        if (asset($deleteMulta)) {
            return response()->json(['message' => 'Informação de multa apagada com sucesso'], 200);
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
