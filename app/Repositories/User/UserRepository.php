<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        return response()->json([
            'status' => true,
            'message'=>'Usuario cadastrado com sucesso',
            'User' => $register
        ], 200);
    }
}
