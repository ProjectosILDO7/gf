<?php

namespace App\Repositories\Estudantes;

use App\Models\graduacao;
use App\Models\cursos;
use App\Models\Estudante;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EstudanteRepository
{

    protected $ententy;
    protected $userID;
    protected $senha;

    public function __construct(Estudante $estudante)
    {
        $this->ententy = $estudante;
        $this->userID=Auth()->user()->id;
        $this->senha = rand(112023, 222050);
    }

    public function getEstudantes()
    {
        
        $estudantes = $this->ententy::with('cursos', 'graduacoes', 'users')->orderBy('nome', 'asc')->where('organization_id', $this->userID)->get();
            if (asset($estudantes)) {
                return response()->json($estudantes);
            } else {
                return response()->json([
                    'status' => 'Erro',
                    'message' => 'Não foi possível carregar a lista de estudantes'
                ], 401);
            }
    }

    public function create($data)
    {


        $user=User::create([
            'name'=>$data['nome'],
            'email'=>$data['email'],
            'admin'=>'Estudante',
            'password'=>bcrypt($this->senha)
        ]);

        $user_id=$user->id;

        $organization_id=Auth()->user()->id;
        
        $saveEstudante = $this->ententy::create([
            'user_id'=>$user_id,
            'curso_id'=>$data['curso_id'],
            'grade_id'=>$data['grade_id'],
            'image'=>$data['image'],
            'nome'=>$data['nome'],
            'numBI'=>$data['numBI'],
            'organization_id'=>$organization_id
        ]);

        if (asset($saveEstudante)) {
            return response()->json([
                'status' => 'Sucesso',
                'Estudante' => $saveEstudante,
                'Senha'=>$this->senha,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Nao foi possível cadastrar o estudante. deve-se a um problema interno.!'
            ], 401);
        }
    }

    public function getEstudante($id)
    {
        //dd($id);
        $getEstudante = $this->ententy::find($id);
        if (asset($getEstudante)) {
            return response()->json([
                'getEstudante' => $getEstudante
            ], 200);
        } else {
            return response()->json([
                'message' => 'Estudante não encontrado..!'
            ], 401);
        }
    }

    public function updateEstudante($request, $id)
    {
        $updateEstudante = $this->ententy::find($id);

        $data = $request->only('nome', 'image', 'numBI');
        if($request->curso_id){
            $data['curso_id']=$request->curso_id;
        }

        if($request->grade_id){
            $data['grade_id']=$request->grade_id;
        }

        $updateEstudante->update($data);


        if (asset($updateEstudante)) {
            return response()->json(['message' => 'Estudante actualizado com sucesso'], 200);
        } else {
            return response()->json(['Erro' => 'Não foi possível actualizar este estudante'], 401);
        }


    }

    public function apagar($id)
    {
        $deleteEstudante = $this->ententy::find($id);
        $deleteEstudante->delete();

        if (asset($deleteEstudante)) {
            return response()->json(['message' => 'Estudante apagado com sucesso'], 200);
        } else {
            return response()->json(['erro' => 'Não foi possível apagar'], 401);
        }
    }

    public function detalhes($id){
        $detalhes = $this->ententy::with('cursos', 'graduacoes', 'users')->find($id);

        if(asset($detalhes)){
            return response()->json($detalhes);
        }else{
            return response()->json(['erro'=>'Não foi possível carregar os detalhes']);
        }
    }
}
