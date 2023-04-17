<?php

namespace App\Repositories\Tcc;

use App\Models\Tcc;
use Illuminate\Support\Facades\Auth;

class tccRepository
{

    protected $ententy;
    protected $userID;

    public function __construct(Tcc $tcc)
    {
        $this->ententy = $tcc;
        $this->userID = Auth()->user()->id;
    }

    public function getTccs()
    {
        $Tcc = $this->ententy::with('cursos')->orderBy('cobranca', 'asc')->where('user_id', $this->userID)->get();
        if (asset($Tcc)) {
            return response()->json($Tcc);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Não foi possível carregar...!'
            ], 401);
        }
    }

    public function create($data)
    {

        $saveTcc = $this->ententy::create([
            'user_id' => $this->userID,
            'cobranca' => $data->cobranca
        ]);


        $saveTcc->cursos()->attach($data->curso_id);

        if (asset($saveTcc)) {
            return response()->json([
                'status' => 'Sucesso',
                'tccs' => $saveTcc,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Nao foi possível cadastrar... deve-se a um problema interno.!'
            ], 401);
        }
    }

    public function getTcc($id)
    {
        //dd($id);
        $getTcc = $this->ententy::find($id);

        if (asset($getTcc)) {
            return response()->json([
                'getTcc' => $getTcc
            ], 200);
        } else {
            return response()->json([
                'message' => 'Não encontrado..!'
            ], 401);
        }
    }

    public function updateTcc($request, $id)
    {
        $updateTcc = $this->ententy::find($id);
        
        $data = $request->only('cobranca');

        if($request->curso_id){
            $updateTcc->cursos()->attach($request->curso_id);
        }

        $updateTcc->update($data);


        if (asset($updateTcc)) {
            return response()->json(['message' => 'Actualizado com sucesso'], 200);
        } else {
            return response()->json(['Erro' => 'Não foi possível actualizar...!'], 401);
        }
    }

    public function apagar($id)
    {

        $deleteTcc= $this->ententy::find($id);
        $deleteTcc->delete();

        if (asset($deleteTcc)) {
            return response()->json(['message' => 'Apagado com sucesso'], 200);
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
