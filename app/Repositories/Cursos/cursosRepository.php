<?php

namespace App\Repositories\Cursos;

use App\Models\curso;

class CursosRepository {

    protected $ententy;

    public function __construct(curso $cursos)
    {
        $this->ententy=$cursos;
    }

    public function getCourses(){
        $cursos = $this->ententy::orderBy('cursos', 'asc')->get();
        if(asset($cursos)){
            return response()->json(compact('cursos'));
        }else{
            return response()->json([
                'status'=>'Erro',
                'message'=>'Não foi possível carregar os cursos'
            ],401);
        }
    }

    public function create($data){

        $saveCurso = $this->ententy::create([
            'cursos'=>$data['cursos'],
            'cobranca'=>$data['cobranca']
        ]);
        
        if(asset($saveCurso)){
            return response()->json([
                'status'=>'Sucesso',
                'Curso'=>$saveCurso,
            ], 200);
        }else{
            return response()->json([
                'status'=>'Erro',
                'message'=>'Nao foi possível cadastrar este curso. deve-se a um problema interno.!'
            ], 401);
        }
    }
}