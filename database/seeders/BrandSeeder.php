<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name' => 'AMD',
                'short_description' => '',
                'description' => '',
            ],
            [
                'name' => 'Intel',
                'short_description' => '',
                'description' => '',
            ],
            [
                'name' => 'Noctua',
                'short_description' => '',
                'description' => '',
            ],
            [
                'name' => 'G.SKILL',
                'short_description' => '',
                'description' => '',
            ],
            [
                'name' => 'Asus',
                'short_description' => '',
                'description' => '',
            ],
            [
                'name' => 'Samsung',
                'short_description' => '',
                'description' => '',
            ],
            [
                'name' => 'Western Digital',
                'short_description' => '',
                'description' => '',
            ],
            [
                'name' => 'Corsair',
                'short_description' => '',
                'description' => '',
            ],
            [
                'name' => 'Fractal Design',
                'short_description' => '',
                'description' => '',
            ],
        ];

        $brands = json_decode(json_encode($brands, JSON_UNESCAPED_UNICODE));

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand->name,
                'short_description' => $brand->short_description,
                'description' => $brand->description,
            ]);
        }
    }
}
