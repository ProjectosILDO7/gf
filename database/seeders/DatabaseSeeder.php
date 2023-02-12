<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\User::factory()->create([
            'name' => 'Ildo Cuema',
            'email' => 'ildocuema@gmail.com',
            'admin' => 'super_admin',
            'email_verified_at' => now(),
            'password' => bcrypt('password_ildo7Cuema'),
            'remember_token' => Str::random(1),
        ]);
    }
}
