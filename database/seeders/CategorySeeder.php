<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Components',
                'parent_id' => null,
            ],
            [
                'name' => 'CPU',
                'parent_id' => 1,
            ],
            [
                'name' => 'Cooling',
                'parent_id' => 1,
            ],
            [
                'name' => 'Water cooling',
                'parent_id' => 3,
            ],
            [
                'name' => 'CPU',
                'parent_id' => 4,
            ],
            [
                'name' => 'GPU',
                'parent_id' => 4,
            ],
            [
                'name' => 'SSD',
                'parent_id' => 4,
            ],
            [
                'name' => 'Air cooling',
                'parent_id' => 3,
            ],
            [
                'name' => 'CPU',
                'parent_id' => 8,
            ],
            [
                'name' => 'GPU',
                'parent_id' => 8,
            ],
            [
                'name' => 'Case fans',
                'parent_id' => 8,
            ],
            [
                'name' => 'SSD',
                'parent_id' => 8,
            ],
            [
                'name' => 'Accessories',
                'parent_id' => 3,
            ],
            [
                'name' => 'Thermal compounds',
                'parent_id' => 13,
            ],
            [
                'name' => 'Thermal pads',
                'parent_id' => 13,
            ],
            [
                'name' => 'Cables',
                'parent_id' => 13,
            ],
            [
                'name' => 'Fan controllers',
                'parent_id' => 13,
            ],
            [
                'name' => 'Coolants',
                'parent_id' => 13,
            ],
            [
                'name' => 'Fittings',
                'parent_id' => 13,
            ],
            [
                'name' => 'Hard tubing',
                'parent_id' => 13,
            ],
            [
                'name' => 'Soft tubing',
                'parent_id' => 13,
            ],
            [//21
                'name' => 'RAM',
                'parent_id' => 1,
            ],
            [
                'name' => 'Motherboard',
                'parent_id' => 1,
            ],
            [
                'name' => 'GPU',
                'parent_id' => 1,
            ],
            [
                'name' => 'SSD',
                'parent_id' => 1,
            ],
            [
                'name' => 'HDD',
                'parent_id' => 1,
            ],
            [
                'name' => 'PSU',
                'parent_id' => 1,
            ],
            [
                'name' => 'Case',
                'parent_id' => 1,
            ],
        ];

        $categories = json_decode(json_encode($categories, JSON_UNESCAPED_UNICODE));

        foreach ($categories as $category) {
            Category::create([
                'name' => $category->name,
                'parent_id' => $category->parent_id,
            ]);
        }
    }
}
