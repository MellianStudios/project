<?php

namespace Database\Seeders;

use App\Models\ItemSpecificationType;
use Illuminate\Database\Seeder;

class ItemSpecificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'category_id' => 2,
                'system_name' => 'core_count',
                'name' => 'Core count',
                'units' => null,
                'required' => true,
                'order' => 1,
            ],
            [
                'category_id' => 2,
                'system_name' => 'thread_count',
                'name' => 'Thread count',
                'units' => null,
                'required' => true,
                'order' => 2,
            ],
            [
                'category_id' => 2,
                'system_name' => 'frequency',
                'name' => 'Frequency',
                'units' => 'MHz',
                'required' => true,
                'order' => 3,
            ],
            [
                'category_id' => 2,
                'system_name' => 'boost',
                'name' => 'Boost',
                'units' => 'MHz',
                'required' => true,
                'order' => 4,
            ],
            [
                'category_id' => 2,
                'system_name' => 'tdp',
                'name' => 'TDP',
                'units' => 'W',
                'required' => true,
                'order' => 5,
            ],
            [
                'category_id' => 2,
                'system_name' => 'cache',
                'name' => 'Cache',
                'units' => 'MB',
                'required' => true,
                'order' => 6,
            ],
            [
                'category_id' => 2,
                'system_name' => 'socket',
                'name' => 'Socket',
                'units' => null,
                'required' => true,
                'order' => 7,
            ],
            [
                'category_id' => 2,
                'system_name' => 'integrated_gpu',
                'name' => 'Integrated GPU',
                'units' => null,
                'required' => true,
                'order' => 8,
            ],
            [
                'category_id' => 3,
                'system_name' => 'sockets',
                'name' => 'Sockets',
                'units' => null,
                'required' => true,
                'order' => 1,
            ],
            [
                'category_id' => 3,
                'system_name' => 'type',
                'name' => 'Type',
                'units' => null,
                'required' => true,
                'order' => 2,
            ],
            [
                'category_id' => 4,
                'system_name' => 'type',
                'name' => 'Type',
                'units' => null,
                'required' => true,
                'order' => 1,
            ],
            [
                'category_id' => 4,
                'system_name' => 'capacity',
                'name' => 'Capacity',
                'units' => 'GB',
                'required' => true,
                'order' => 2,
            ],
            [
                'category_id' => 4,
                'system_name' => 'frequency',
                'name' => 'Frequency',
                'units' => 'MHz',
                'required' => true,
                'order' => 3,
            ],
            [
                'category_id' => 5,
                'system_name' => 'socket',
                'name' => 'Socket',
                'units' => null,
                'required' => true,
                'order' => 1,
            ],
            [
                'category_id' => 5,
                'system_name' => 'chipset',
                'name' => 'Chipset',
                'units' => null,
                'required' => true,
                'order' => 2,
            ],
            [
                'category_id' => 5,
                'system_name' => 'format',
                'name' => 'Format',
                'units' => null,
                'required' => true,
                'order' => 3,
            ],
            [
                'category_id' => 6,
                'system_name' => 'chip_maker',
                'name' => 'Chip maker',
                'units' => null,
                'required' => true,
                'order' => 1,
            ],
            [
                'category_id' => 6,
                'system_name' => 'frequency',
                'name' => 'Frequency',
                'units' => 'MHz',
                'required' => true,
                'order' => 2,
            ],
            [
                'category_id' => 6,
                'system_name' => 'boost',
                'name' => 'Boost',
                'units' => 'MHz',
                'required' => true,
                'order' => 3,
            ],
            [
                'category_id' => 6,
                'system_name' => 'ram_type',
                'name' => 'RAM type',
                'units' => null,
                'required' => true,
                'order' => 4,
            ],
            [
                'category_id' => 6,
                'system_name' => 'ram_capacity',
                'name' => 'RAM capacity',
                'units' => 'GB',
                'required' => true,
                'order' => 5,
            ],
            [
                'category_id' => 6,
                'system_name' => 'ram_frequency',
                'name' => 'RAM frequency',
                'units' => 'MHz',
                'required' => true,
                'order' => 6,
            ],
            [
                'category_id' => 7,
                'system_name' => 'form_factor',
                'name' => 'Form factor',
                'units' => null,
                'required' => true,
                'order' => 1,
            ],
            [
                'category_id' => 7,
                'system_name' => 'capacity',
                'name' => 'Capacity',
                'units' => 'GB',
                'required' => true,
                'order' => 2,
            ],
            [
                'category_id' => 7,
                'system_name' => 'read_speed',
                'name' => 'Read speed',
                'units' => 'MB/s',
                'required' => true,
                'order' => 3,
            ],
            [
                'category_id' => 7,
                'system_name' => 'write_speed',
                'name' => 'Write speed',
                'units' => 'MB/s',
                'required' => true,
                'order' => 4,
            ],
            [
                'category_id' => 8,
                'system_name' => 'capacity',
                'name' => 'Capacity',
                'units' => 'GB',
                'required' => true,
                'order' => 1,
            ],
            [
                'category_id' => 8,
                'system_name' => 'rpm',
                'name' => 'RPM',
                'units' => null,
                'required' => true,
                'order' => 2,
            ],
            [
                'category_id' => 8,
                'system_name' => 'read_speed',
                'name' => 'Read speed',
                'units' => 'MB/s',
                'required' => true,
                'order' => 3,
            ],
            [
                'category_id' => 8,
                'system_name' => 'write_speed',
                'name' => 'Write speed',
                'units' => 'MB/s',
                'required' => true,
                'order' => 4,
            ],
            [
                'category_id' => 9,
                'system_name' => 'efficacy',
                'name' => 'Efficacy',
                'units' => null,
                'required' => true,
                'order' => 1,
            ],
            [
                'category_id' => 9,
                'system_name' => 'maximum_power',
                'name' => 'Maximum power',
                'units' => 'W',
                'required' => true,
                'order' => 2,
            ],
            [
                'category_id' => 9,
                'system_name' => 'form_factor',
                'name' => 'Form factor',
                'units' => null,
                'required' => true,
                'order' => 3,
            ],
            [
                'category_id' => 10,
                'system_name' => 'size',
                'name' => 'Size',
                'units' => null,
                'required' => true,
                'order' => 1,
            ],
            [
                'category_id' => 10,
                'system_name' => 'motherboard_format',
                'name' => 'Motherboard format',
                'units' => null,
                'required' => true,
                'order' => 2,
            ],
        ];

        $types = json_decode(json_encode($types, JSON_UNESCAPED_UNICODE));

        foreach ($types as $type) {
            ItemSpecificationType::create([
                'category_id' => $type->category_id,
                'system_name' => $type->system_name,
                'name' => $type->name,
                'units' => $type->units,
                'required' => $type->required,
                'order' => $type->order,
            ]);
        }
    }
}
