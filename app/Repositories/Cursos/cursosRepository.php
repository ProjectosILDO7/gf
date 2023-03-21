<?php

namespace App\Repositories\Cursos;

use App\Models\curso;

class CursosRepository
{

    protected $ententy;

    public function __construct(curso $cursos)
    {
        $this->ententy = $cursos;
    }

    public function getCourses()
    {
        
        $cursos = $this->ententy::orderBy('cursos', 'asc')->get();
            if (asset($cursos)) {
                return response()->json($cursos);
            } else {
                return response()->json([
                    'status' => 'Erro',
                    'message' => 'Não foi possível carregar os cursos'
                ], 401);
            }
    }

    public function filtro($nome){
        
    }

    public function create($data)
    {

        $saveCurso = $this->ententy::create([
            'cursos' => $data['cursos'],
            'cobranca' => $data['cobranca']
        ]);

        if (asset($saveCurso)) {
            return response()->json([
                'status' => 'Sucesso',
                'Curso' => $saveCurso,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Nao foi possível cadastrar este curso. deve-se a um problema interno.!'
            ], 401);
        }
    }

    public function getCourse($id)
    {
        //dd($id);
        $getCourse = $this->ententy::find($id);
        if (asset($getCourse)) {
            return response()->json([
                'getCourse' => $getCourse
            ], 200);
        } else {
            return response()->json([
                'message' => 'Curso não encontrado..!'
            ], 401);
        }
    }

    public function updateCurso($data, $id)
    {
        $updateCourse = $this->ententy::find($id);
        $updateCourse->cursos = $data['cursos'];
        $updateCourse->cobranca = $data['cobranca'];
        $updateCourse->save();

        if (asset($updateCourse)) {
            return response()->json(['message' => 'O curso foi actualizado com sucesso'], 200);
        } else {
            return response()->json(['Erro' => 'Não foi possível actualizar este curso'], 401);
        }
    }

    public function apagar($id)
    {
        $deleteCourse = $this->ententy::find($id);
        $deleteCourse->delete();

        if (asset($deleteCourse)) {
            return response()->json(['message' => 'Este curso foi apagadno com sucesso'], 200);
        } else {
            return response()->json(['erro' => 'Não foi possível apagar este curso'], 401);
        }
    }

    public function detalhes($id){
        $detalhes = $this->ententy::find($id);
        if(asset($detalhes)){
            return response()->json($detalhes);
        }else{
            return response()->json(['erro'=>'Não foi possível carregar os detalhes']);
        }
    }
}
