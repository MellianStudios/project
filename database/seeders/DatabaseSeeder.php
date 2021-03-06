<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BrandSeeder::class,
            ItemFamilySeeder::class,
            CategorySeeder::class,
            ItemSpecificationTypeSeeder::class,
            ItemSeeder::class,
            CurrencySeeder::class,
            PriceSeeder::class,
        ]);
    }
}
