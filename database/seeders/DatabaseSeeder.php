<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
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

        $c=Categoria::all();
        
        if(count($c)!=0){
            return true;
        }

        $categ_id=Categoria::factory()->create([
            'categoria'=>'Prof. Do Ens. Prim. e Sec. do 6º grau',
            'remoneracao'=>'252000',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Ildo Cuema',
            'email' => 'ildocuema@gmail.com',
            'numBI' => '000583073HA039',
            'dataValidadeBI' => '03-09-2023',
            'departamento_id' => $dep_id->id,
            'categoria_id' => $categ_id->id,
            'email_verified_at' => now(),
            'password' => bcrypt('password_ildo7Cuema'),
            'status' => '1',
            'remember_token' => Str::random(1),
        ]);
    }
}
