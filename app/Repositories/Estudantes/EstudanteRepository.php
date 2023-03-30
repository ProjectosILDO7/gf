<?php

namespace App\Repositories\Estudantes;

use App\Models\cursos;
use Illuminate\Http\File;
use App\Models\Estudante;
use App\Models\reserva_senha_estudante;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Image;


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
        
        $estudantes = $this->ententy::with('cursos', 'graduacoes', 'users', 'senhas')->orderBy('nome', 'asc')->where('organization_id', $this->userID)->get();
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

        if($data->image){
            $image=time() . '.' . explode('/', explode(':', substr($data->image, 0, strpos($data->image, ';')))[1])[1];
            Image::make($data->image)->save(public_path('storage/image/estudantes/'.$image));
        }else{
            $image=null;
        }
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
            'image'=>$image,
            'nome'=>$data['nome'],
            'numBI'=>$data['numBI'],
            'organization_id'=>$organization_id
        ]);

        reserva_senha_estudante::create([
            'estudante_id'=>$saveEstudante->id,
            'organization_id'=>$organization_id,
            'senha_reserva'=>$this->senha
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

        $data = $request->only('nome','numBI');
        if($request->curso_id){
            $data['curso_id']=$request->curso_id;
        }

        if($request->grade_id){
            $data['grade_id']=$request->grade_id;
        }

        if($request->image){
            //Se existir uma imagem na pasta de estudante de referencia entao apaga-se esta e cadastra-se outra
            if(Storage::exists('/image/estudantes/'.$updateEstudante->image)){
                Storage::delete('/image/estudantes/'.$updateEstudante->image);
            }
            $data['image']=time() . '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            Image::make($request->image)->save(public_path('storage/image/estudantes/'.$data['image']));
        }else{
            $data['image']=null;
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
       
        $deleteImage=Storage::disk('public')->delete('/image/estudantes/'.$deleteEstudante->image);

        if(asset($deleteImage)){
           $deleteEstudante->delete();
        }
        
        if (asset($deleteEstudante)) {
            return response()->json(['message' => 'Estudante apagado com sucesso'], 200);
        } else {
            return response()->json(['erro' => 'Não foi possível apagar'], 401);
        }
    }

    public function detalhes($id){
        $detalhes = $this->ententy::with('cursos', 'graduacoes', 'users', 'senhas')->find($id);

        if(asset($detalhes)){
            return response()->json($detalhes);
        }else{
            return response()->json(['erro'=>'Não foi possível carregar os detalhes']);
        }
    }
}
