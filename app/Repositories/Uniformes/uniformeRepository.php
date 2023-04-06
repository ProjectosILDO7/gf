<?php

namespace App\Repositories\Uniformes;

use App\Models\Uniforme;
use Illuminate\Support\Facades\Auth;

class uniformeRepository
{

    protected $ententy;
    protected $userID;

    public function __construct(Uniforme $uniforme)
    {
        $this->ententy = $uniforme;
        $this->userID = Auth()->user()->id;
    }

    public function getUniformes()
    {
        $uniformes = $this->ententy::orderBy('descricao', 'asc')->where('user_id', $this->userID)->get();
        if (asset($uniformes)) {
            return response()->json($uniformes);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Não foi possível carregar...!'
            ], 401);
        }
    }

    public function create($data)
    {

        $saveUniforme = $this->ententy::create([
            'user_id' => $this->userID,
            'descricao' => $data['descricao'],
            'cobranca' => $data['cobranca']
        ]);

        if (asset($saveUniforme)) {
            return response()->json([
                'status' => 'Sucesso',
                'Emolumento' => $saveUniforme,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Nao foi possível cadastrar informação deste uniforme. deve-se a um problema interno.!'
            ], 401);
        }
    }

    public function geUniforme($id)
    {
        //dd($id);
        $getUniforme = $this->ententy::find($id);
        if (asset($getUniforme)) {
            return response()->json([
                'getUniforme' => $getUniforme
            ], 200);
        } else {
            return response()->json([
                'message' => 'Uniforme não encontrado..!'
            ], 401);
        }
    }

    public function updateUniforme($request, $id)
    {
        $updateUniforme = $this->ententy::find($id);
        $data = $request->all();
        $updateUniforme->update($data);


        if (asset($updateUniforme)) {
            return response()->json(['message' => 'Informação de uniforme actualizado com sucesso'], 200);
        } else {
            return response()->json(['Erro' => 'Não foi possível actualizar...!'], 401);
        }
    }

    public function apagar($id)
    {

        $deleteUniforme = $this->ententy::find($id);
        $deleteUniforme->delete();

        if (asset($deleteUniforme)) {
            return response()->json(['message' => 'Informação de uniforme apagado com sucesso'], 200);
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
