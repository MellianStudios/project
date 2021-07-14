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
                'name' => 'CPU cooler',
                'parent_id' => 1,
            ],
            [
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
