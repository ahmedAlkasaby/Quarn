<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{

    public function run(): void
    {
        for ($i=0; $i < 11; $i++) {

            User::create([
                'name'=>fake()->name(),
                'email'=>fake()->email(),
                'password'=>bcrypt('ahmed145'),
            ]);
        }
    }
}
