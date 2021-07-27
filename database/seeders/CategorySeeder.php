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
                'layer' => 1,
            ],
            [
                'name' => 'CPU',
                'parent_id' => 1,
                'layer' => 2,
            ],
            [
                'name' => 'Cooling',
                'parent_id' => 1,
                'layer' => 2,
            ],
            [
                'name' => 'Water cooling',
                'parent_id' => 3,
                'layer' => 3,
            ],
            [
                'name' => 'CPU',
                'parent_id' => 4,
                'layer' => 4,
            ],
            [
                'name' => 'GPU',
                'parent_id' => 4,
                'layer' => 4,
            ],
            [
                'name' => 'SSD',
                'parent_id' => 4,
                'layer' => 4,
            ],
            [
                'name' => 'Air cooling',
                'parent_id' => 3,
                'layer' => 3,
            ],
            [
                'name' => 'CPU',
                'parent_id' => 8,
                'layer' => 4,
            ],
            [
                'name' => 'GPU',
                'parent_id' => 8,
                'layer' => 4,
            ],
            [
                'name' => 'Case fans',
                'parent_id' => 8,
                'layer' => 4,
            ],
            [
                'name' => 'SSD',
                'parent_id' => 8,
                'layer' => 4,
            ],
            [
                'name' => 'Accessories',
                'parent_id' => 3,
                'layer' => 3,
            ],
            [
                'name' => 'Thermal compounds',
                'parent_id' => 13,
                'layer' => 4,
            ],
            [
                'name' => 'Thermal pads',
                'parent_id' => 13,
                'layer' => 4,
            ],
            [
                'name' => 'Cables',
                'parent_id' => 13,
                'layer' => 4,
            ],
            [
                'name' => 'Fan controllers',
                'parent_id' => 13,
                'layer' => 4,
            ],
            [
                'name' => 'Coolants',
                'parent_id' => 13,
                'layer' => 4,
            ],
            [
                'name' => 'Fittings',
                'parent_id' => 13,
                'layer' => 4,
            ],
            [
                'name' => 'Hard tubing',
                'parent_id' => 13,
                'layer' => 4,
            ],
            [
                'name' => 'Soft tubing',
                'parent_id' => 13,
                'layer' => 4,
            ],
            [//21
                'name' => 'RAM',
                'parent_id' => 1,
                'layer' => 2,
            ],
            [
                'name' => 'Motherboard',
                'parent_id' => 1,
                'layer' => 2,
            ],
            [
                'name' => 'GPU',
                'parent_id' => 1,
                'layer' => 2,
            ],
            [
                'name' => 'SSD',
                'parent_id' => 1,
                'layer' => 2,
            ],
            [
                'name' => 'HDD',
                'parent_id' => 1,
                'layer' => 2,
            ],
            [
                'name' => 'PSU',
                'parent_id' => 1,
                'layer' => 2,
            ],
            [
                'name' => 'Case',
                'parent_id' => 1,
                'layer' => 2,
            ],
        ];

        $categories = json_decode(json_encode($categories, JSON_UNESCAPED_UNICODE));

        foreach ($categories as $category) {
            Category::create([
                'name' => $category->name,
                'parent_id' => $category->parent_id,
                'layer' => $category->layer,
            ]);
        }
    }
}
