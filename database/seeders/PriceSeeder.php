<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prices = [
            [
                'item_id' => 1,
                'currency_id' => 1,
                'value' => 419.9,
            ],
            [
                'item_id' => 2,
                'currency_id' => 1,
                'value' => 566.9,
            ],
            [
                'item_id' => 3,
                'currency_id' => 1,
                'value' => 840.9,
            ],
            [
                'item_id' => 4,
                'currency_id' => 1,
                'value' => 407.9,
            ],
            [
                'item_id' => 5,
                'currency_id' => 1,
                'value' => 438.9,
            ],
            [
                'item_id' => 6,
                'currency_id' => 1,
                'value' => 103.9,
            ],
            [
                'item_id' => 7,
                'currency_id' => 1,
                'value' => 172,
            ],
            [
                'item_id' => 8,
                'currency_id' => 1,
                'value' => 459.9,
            ],
            [
                'item_id' => 9,
                'currency_id' => 1,
                'value' => 1929.9,
            ],
            [
                'item_id' => 10,
                'currency_id' => 1,
                'value' => 148.9,
            ],
            [
                'item_id' => 11,
                'currency_id' => 1,
                'value' => 90.9,
            ],
            [
                'item_id' => 12,
                'currency_id' => 1,
                'value' => 169.9,
            ],
            [
                'item_id' => 13,
                'currency_id' => 1,
                'value' => 203.9,
            ],
        ];

        $prices = json_decode(json_encode($prices, JSON_UNESCAPED_UNICODE));

        foreach ($prices as $price) {
            Price::create([
                'item_id' => $price->item_id,
                'currency_id' => $price->currency_id,
                'value' => $price->value,
            ]);
        }
    }
}
