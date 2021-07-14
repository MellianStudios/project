<?php

namespace Database\Seeders;

use App\Models\ItemFamily;
use Illuminate\Database\Seeder;

class ItemFamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $families = [
            [
                'brand_id' => 1,
                'name' => 'ZEN 2',
                'short_description' => '',
                'description' => '',
            ],
            [
                'brand_id' => 1,
                'name' => 'ZEN 3',
                'short_description' => '',
                'description' => '',
            ],
            [
                'brand_id' => 2,
                'name' => 'Cascade Lake',
                'short_description' => '',
                'description' => '',
            ],
            [
                'brand_id' => 2,
                'name' => 'Tiger Lake',
                'short_description' => '',
                'description' => '',
            ],
            [
                'brand_id' => 3,
                'name' => 'Standard',
                'short_description' => '',
                'description' => '',
            ],
            [
                'brand_id' => 4,
                'name' => 'Trident Z',
                'short_description' => '',
                'description' => '',
            ],
            [
                'brand_id' => 5,
                'name' => 'ROG',
                'short_description' => '',
                'description' => '',
            ],
            [
                'brand_id' => 6,
                'name' => 'EVO',
                'short_description' => '',
                'description' => '',
            ],
            [
                'brand_id' => 7,
                'name' => 'Black',
                'short_description' => '',
                'description' => '',
            ],
            [
                'brand_id' => 8,
                'name' => 'HX',
                'short_description' => '',
                'description' => '',
            ],
            [
                'brand_id' => 9,
                'name' => 'Define',
                'short_description' => '',
                'description' => '',
            ],
        ];

        $families = json_decode(json_encode($families, JSON_UNESCAPED_UNICODE));

        foreach ($families as $family) {
            ItemFamily::create([
                'brand_id' => $family->brand_id,
                'name' => $family->name,
                'short_description' => $family->short_description,
                'description' => $family->description,
            ]);
        }
    }
}
