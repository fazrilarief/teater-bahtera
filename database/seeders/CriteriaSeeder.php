<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'criteria_code' => 'C1',
                'criteria_name' => 'Vokal',
                'criteria_value' => 15,
                'category' => 'Benefit',
            ],
            [
                'criteria_code' => 'C2',
                'criteria_name' => 'Kehadiran',
                'criteria_value' => 25,
                'category' => 'Cost',
            ],
            [
                'criteria_code' => 'C3',
                'criteria_name' => 'Artikulasi',
                'criteria_value' => 20,
                'category' => 'Benefit',
            ],
            [
                'criteria_code' => 'C4',
                'criteria_name' => 'Intonasi',
                'criteria_value' => 20,
                'category' => 'Benefit',
            ],
            [
                'criteria_code' => 'C5',
                'criteria_name' => 'Gesture',
                'criteria_value' => 20,
                'category' => 'Benefit',
            ],
        ];

        foreach ($data as $item) {
            $item['normalisasi'] = $item['criteria_value'] / 100;
            Criteria::create($item);
        }
    }
}
