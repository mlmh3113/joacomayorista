<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::create([
            'images' => json_encode([
                'https://res.cloudinary.com/dkoocayxp/image/upload/v1728249073/Joaco%20Mayorista/daughter-closed-her-mother-s-eye_eiuskc.png'
            ])
            ]);
    }
}
