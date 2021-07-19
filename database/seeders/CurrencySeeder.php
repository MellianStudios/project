<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                'short' => 'EUR',
                'name' => 'Euro',
            ],
            [
                'short' => 'USD',
                'name' => 'United States dollar',
            ],
            [
                'short' => 'GBP',
                'name' => 'Pound sterling',
            ],
            [
                'short' => 'CZK',
                'name' => 'Česká koruna',
            ],
        ];

        $currencies = json_decode(json_encode($currencies, JSON_UNESCAPED_UNICODE));

        foreach ($currencies as $currency) {
            Currency::create([
                'short' => $currency->short,
                'name' => $currency->name,
            ]);
        }
    }
}
