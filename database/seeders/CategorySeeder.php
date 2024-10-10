<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Relojes', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Billeteras', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
