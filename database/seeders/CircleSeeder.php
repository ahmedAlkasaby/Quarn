<?php

namespace Database\Seeders;

use App\Models\Circle;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CircleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 30; $i++) {

            Circle::create([
                'name' => [
                    'en' => fake()->words(3,true),
                    'ar' => fake()->word(3,true),
                ],
                'teacher_id'=>User::inRandomOrder()->first()->id,
                'date' => fake()->date(),
            ]);
        }
    }
}
