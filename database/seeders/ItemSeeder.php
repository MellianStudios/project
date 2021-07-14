<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template = [
            [
                'name' => '',
                'short_description' => '',
                'description' => '',
                'category_id' => 0,
                'item_family_id' => 0,
                'specs' => [
                    0 => ['value' => ''],
                ],
            ],
        ];

        $items = [
            [
                'name' => 'Ryzen 9 3900X',
                'short_description' => '',
                'description' => '',
                'category_id' => 2,
                'item_family_id' => 1,
                'specs' => [
                    1 => ['value' => '12'],
                    2 => ['value' => '24'],
                    3 => ['value' => '3800'],
                    4 => ['value' => '4600'],
                    5 => ['value' => '105'],
                    6 => ['value' => '64'],
                    7 => ['value' => 'AM4'],
                    8 => ['value' => 'None'],
                ],
            ],
            [
                'name' => 'Ryzen 9 5900X',
                'short_description' => '',
                'description' => '',
                'category_id' => 2,
                'item_family_id' => 2,
                'specs' => [
                    1 => ['value' => '12'],
                    2 => ['value' => '24'],
                    3 => ['value' => '3700'],
                    4 => ['value' => '4800'],
                    5 => ['value' => '105'],
                    6 => ['value' => '64'],
                    7 => ['value' => 'AM4'],
                    8 => ['value' => 'None'],
                ],
            ],
            [
                'name' => 'Ryzen 9 5950X',
                'short_description' => '',
                'description' => '',
                'category_id' => 2,
                'item_family_id' => 2,
                'specs' => [
                    1 => ['value' => '16'],
                    2 => ['value' => '32'],
                    3 => ['value' => '3400'],
                    4 => ['value' => '4900'],
                    5 => ['value' => '105'],
                    6 => ['value' => '64'],
                    7 => ['value' => 'AM4'],
                    8 => ['value' => 'None'],
                ],
            ],
            [
                'name' => 'Core i9-10900',
                'short_description' => '',
                'description' => '',
                'category_id' => 2,
                'item_family_id' => 3,
                'specs' => [
                    1 => ['value' => '10'],
                    2 => ['value' => '20'],
                    3 => ['value' => '2800'],
                    4 => ['value' => '5100'],
                    5 => ['value' => '65'],
                    6 => ['value' => '20'],
                    7 => ['value' => 'LGA1200'],
                    8 => ['value' => 'UHD Graphics 630'],
                ],
            ],
            [
                'name' => 'Core i9-11900',
                'short_description' => '',
                'description' => '',
                'category_id' => 2,
                'item_family_id' => 4,
                'specs' => [
                    1 => ['value' => '8'],
                    2 => ['value' => '16'],
                    3 => ['value' => '2500'],
                    4 => ['value' => '5200'],
                    5 => ['value' => '65'],
                    6 => ['value' => '16'],
                    7 => ['value' => 'LGA1200'],
                    8 => ['value' => 'UHD Graphics 750'],
                ],
            ],
            [
                'name' => 'NH-D15',
                'short_description' => '',
                'description' => '',
                'category_id' => 3,
                'item_family_id' => 5,
                'specs' => [
                    9 => ['value' => ' Intel LGA2066, LGA2011-0 & LGA2011-3 (Square ILM), LGA1200, LGA1156, LGA1155, LGA1151, LGA1150 & AMD AM2, AM2+, AM3, AM3+, FM1, FM2, FM2+ (backplate required), AM4 (included since 2019, older coolers require NM-AM4)'],
                    10 => ['value' => 'air'],
                ],
            ],
            [
                'name' => 'Trident Z RGB Neo 32GB (2x8) 3600MHz CL16',
                'short_description' => '',
                'description' => '',
                'category_id' => 4,
                'item_family_id' => 6,
                'specs' => [
                    11 => ['value' => 'DDR4'],
                    12 => ['value' => '32'],
                    13 => ['value' => '3600'],
                ],
            ],
            [
                'name' => 'ROG CROSSHAIR VIII DARK HERO',
                'short_description' => '',
                'description' => '',
                'category_id' => 5,
                'item_family_id' => 7,
                'specs' => [
                    14 => ['value' => 'AM4'],
                    15 => ['value' => 'X570'],
                    16 => ['value' => 'ATX'],
                ],
            ],
            [
                'name' => 'ROG STRIX GeForce RTX 3080 Ti GAMING 12G',
                'short_description' => '',
                'description' => '',
                'category_id' => 6,
                'item_family_id' => 7,
                'specs' => [
                    17 => ['value' => 'NVIDIA'],
                    18 => ['value' => '1365'],
                    19 => ['value' => '1695'],
                    20 => ['value' => 'GDDR6X'],
                    21 => ['value' => '12'],
                    22 => ['value' => '19000'],
                ],
            ],
            [
                'name' => '970 EVO 1000GB',
                'short_description' => '',
                'description' => '',
                'category_id' => 7,
                'item_family_id' => 8,
                'specs' => [
                    23 => ['value' => 'M.2'],
                    24 => ['value' => '1000'],
                    25 => ['value' => '3400'],
                    26 => ['value' => '2500'],
                ],
            ],
            [
                'name' => 'Black 1000GB',
                'short_description' => '',
                'description' => '',
                'category_id' => 8,
                'item_family_id' => 9,
                'specs' => [
                    27 => ['value' => '1000'],
                    28 => ['value' => '7200'],
                    29 => ['value' => '150'],
                    30 => ['value' => '150'],
                ],
            ],
            [
                'name' => 'HX850',
                'short_description' => '',
                'description' => '',
                'category_id' => 9,
                'item_family_id' => 10,
                'specs' => [
                    30 => ['value' => '80 PLUS Platinum'],
                    31 => ['value' => '850'],
                    32 => ['value' => 'ATX'],
                ],
            ],
            [
                'name' => 'Define 7 XL Black',
                'short_description' => '',
                'description' => '',
                'category_id' => 10,
                'item_family_id' => 11,
                'specs' => [
                    33 => ['value' => 'Big tower'],
                    34 => ['value' => 'eATX'],
                ],
            ],
        ];

        foreach ($items as $item) {
            $model = Item::create([
                'name' => $item['name'],
                'short_description' => $item['short_description'],
                'description' => $item['description'],
                'category_id' => $item['category_id'],
                'item_family_id' => $item['item_family_id'],
            ]);

            $model->specs()->attach($item['specs']);
        }
    }
}
