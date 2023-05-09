<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Departamento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        $d=Departamento::all();
        
        if(count($d)!=0){
            return true;
        }

        $dep_id=Departamento::factory()->create([
            'departamento'=>'Recursos humanos',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Ildo Cuema',
            'email' => 'ildocuema@gmail.com',
            'departamento_id' => $dep_id->id,
            'email_verified_at' => now(),
            'password' => bcrypt('password_ildo7Cuema'),
            'remember_token' => Str::random(1),
        ]);
    }
}
