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
        $cursos = $this->ententy::paginate(10);
        if(asset($cursos)){
            return response()->json([
                'status'=>'Sucesso',
                'cursos'=>$cursos
            ],200);
        }else{
            return response()->json([
                'status'=>'Erro',
                'message'=>'Não foi possível carregar os cursos'
            ],401);
        }
    }
}