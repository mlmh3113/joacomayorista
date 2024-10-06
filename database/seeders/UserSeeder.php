<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Simon',
            'email' => 'Simon@gmail.com',
            'password' => bcrypt('simon1985'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Martin',
            'email' => 'mlmh3113@hotmail.com',
            'password' => bcrypt('mono1234'),
        ])->assignRole('Admin');


    }
}
