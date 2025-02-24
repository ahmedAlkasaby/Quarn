<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin=Admin::create([
            'name' => 'ahmed',
            'email' => "alkasaby145@gmail.com",
            'password' => bcrypt('ahmed145'),
            'active' => 1,
        ]);

        $admin->addRole('admin');


        for ($i = 0; $i < 10; $i++) {
            $admin=Admin::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => bcrypt('ahmed145'),
                'active' => rand(0, 1),
            ]);
            $admin->addRole('manger');
        }
    }
}
