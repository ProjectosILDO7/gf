<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Image;

class UserRepository
{

    protected $entety;

    public function __construct(User $model)
    {
        $this->entety = $model;
    }

    public function save($data)
    {
        
        $register = $this->entety::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($data['password']),
            'remember_token' => Str::random(1),
        ]);

        if(asset($register)){
            return response()->json([
                'status' => 200,
                'message'=>'Usuario cadastrado com sucesso',
                'User' => $register
            ], 200);
        }else{
            return response()->json([
                'status' => 500,
                'message'=>'Erro ao criar conta',
            ], 500);
        }

        
    }

    public function updateUser($request){

        if(!$user=auth()->user()){
            return response()->json([
                'status' => 401,
                'message'=>'Usuário não encotrado'
            ]);
        }else{
            $data = $request->only('name', 'email');
            
            if($request->image){
                if(Storage::exists('/image/users/'.$user->image)){
                    Storage::delete('/image/users/'.$user->image);
                }
                $data['image']=time() . '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
                Image::make($request->image)->save(public_path('storage/image/users/'.$data['image']));
            };

            if($request->password){
                $user['password'] = bcrypt($request->password);
            }
                
            $user->update($data);

            if(asset($user)){
                return response()->json([
                    'status'    => 200,
                    'message'   => 'Dados actualizados com sucesso!'
                ], 200);
            }else{
                return response()->json([
                    'status'    => 500,
                    'message'   => 'Erro ao actualizar os dados!'
                ], 500);
            }
            
        }
       
    }
}
