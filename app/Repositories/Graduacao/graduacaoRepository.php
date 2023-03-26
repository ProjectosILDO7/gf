<?php

namespace App\Repositories\Graduacao;

use App\Models\curso_grades;
use App\Models\graduacao;
use Illuminate\Support\Facades\DB;

class GraduacaoRepository
{

    protected $ententy;
    protected $userID;

    public function __construct(graduacao $graduacao)
    {
        $this->ententy = $graduacao;
        $this->userID=Auth()->user()->id;
    }

    public function getGraduactions()
    {
        
        $graduacao = $this->ententy::orderBy('grade', 'asc')->where('user_id', $this->userID)->get();
            if (asset($graduacao)) {
                return response()->json($graduacao);
            } else {
                return response()->json([
                    'status' => 'Erro',
                    'message' => 'Não foi possível carregar as graduação'
                ], 401);
            }
    }

    public function create($data)
    {

        $saveGraduaction = $this->ententy::create([
            'grade' => $data['grade'],
            'user_id'=>$this->userID
        ]);

        $saveGraduaction->cursos()->attach($data['curso_id']);

        if (asset($saveGraduaction)) {
            return response()->json([
                'status' => 'Sucesso',
                'Graduaction' => $saveGraduaction,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Nao foi possível cadastrar esta Graduação. deve-se a um problema interno.!'
            ], 401);
        }
    }

    public function getGraduaction($id)
    {
        //dd($id);
        $getGraduaction = $this->ententy::find($id);
        if (asset($getGraduaction)) {
            return response()->json([
                'getGraduaction' => $getGraduaction
            ], 200);
        } else {
            return response()->json([
                'message' => 'Graduação não encontrado..!'
            ], 401);
        }
    }

    public function updateGraduaction($request, $id)
    {
        $updateGraduaction = $this->ententy::find($id);
        $data = $request->only('grade');
        if($request->curso_id){
            $updateGraduaction->cursos()->sync($request['curso_id']);
        }
        // $updateGraduaction->grade = $data['grade'];
        // $updateGraduaction->save();
        $updateGraduaction->update($data);


        

        if (asset($updateGraduaction)) {
            return response()->json(['message' => 'A Graduação foi actualizada com sucesso'], 200);
        } else {
            return response()->json(['Erro' => 'Não foi possível actualizar esta Graduação'], 401);
        }


    }

    public function apagar($id)
    {
        $deleteGraduaction = $this->ententy::find($id);
        $deleteGraduaction->delete();

        if (asset($deleteGraduaction)) {
            return response()->json(['message' => 'Esta Graduação foi apagada com sucesso'], 200);
        } else {
            return response()->json(['erro' => 'Não foi possível apagar esta Graduação'], 401);
        }
    }

    public function detalhes($id){
        $detalhes = $this->ententy::with('cursos')->find($id);

        if(asset($detalhes)){
            return response()->json($detalhes);
        }else{
            return response()->json(['erro'=>'Não foi possível carregar os detalhes']);
        }
    }
}
