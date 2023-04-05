<?php

namespace App\Repositories\Emolumentos;

use App\Exports\Disciplinas_cursosExport;
use App\Models\Emolumento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class emolumentosRepository
{

    protected $ententy;
    protected $userID;

    public function __construct(Emolumento $emolumento)
    {
        $this->ententy = $emolumento;
        $this->userID = Auth()->user()->id;
    }

    public function getEmolumentos()
    {
        $emolumentos = $this->ententy::orderBy('emolumento', 'asc')->where('user_id', $this->userID)->get();
        if (asset($emolumentos)) {
            return response()->json($emolumentos);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Não foi possível carregar os emolumentos'
            ], 401);
        }
    }

    public function create($data)
    {

        $saveEmolumento = $this->ententy::create([
            'user_id' => $this->userID,
            'emolumento' => $data['emolumento'],
            'cobranca' => $data['cobranca']
        ]);

        if (asset($saveEmolumento)) {
            return response()->json([
                'status' => 'Sucesso',
                'Emolumento' => $saveEmolumento,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Nao foi possível cadastrar este emolumento. deve-se a um problema interno.!'
            ], 401);
        }
    }

    public function getEmolumento($id)
    {
        //dd($id);
        $getEmolumento = $this->ententy::find($id);
        if (asset($getEmolumento)) {
            return response()->json([
                'getEmolumento' => $getEmolumento
            ], 200);
        } else {
            return response()->json([
                'message' => 'Emolumento não encontrado..!'
            ], 401);
        }
    }

    public function updateEmolumento($request, $id)
    {
        $updateEmolumento = $this->ententy::find($id);
        $data = $request->all();
        $updateEmolumento->update($data);


        if (asset($updateEmolumento)) {
            return response()->json(['message' => 'O emolumento foi actualizado com sucesso'], 200);
        } else {
            return response()->json(['Erro' => 'Não foi possível actualizar este emolumento'], 401);
        }
    }

    public function apagar($id)
    {

        $deleteEmolumento = $this->ententy::find($id);
        $deleteEmolumento->delete();

        if (asset($deleteEmolumento)) {
            return response()->json(['message' => 'Este emolumento foi apagado com sucesso'], 200);
        } else {
            return response()->json(['erro' => 'Não foi possível apagar este emolumento'], 401);
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
