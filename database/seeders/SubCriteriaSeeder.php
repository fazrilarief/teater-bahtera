<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criteria 1
        $SubCriteria1 = [
            [
                'sub_criteria_name' => 'Tidak Lantang',
                'sub_criteria_value' => 30,
            ],
            [
                'sub_criteria_name' => 'Kurang Lantang',
                'sub_criteria_value' => 50,
            ],
            [
                'sub_criteria_name' => 'Lantang',
                'sub_criteria_value' => 80,
            ],
            [
                'sub_criteria_name' => 'Sangat Lantang',
                'sub_criteria_value' => 100,
            ],
        ];

        // sub criteria untuk Criteria 1
        $criteria1 = Criteria::where('criteria_code', 'C1')->first();
        foreach ($SubCriteria1 as $subCriteria) {
            SubCriteria::create([
                'sub_criteria_name' => $subCriteria['sub_criteria_name'],
                'sub_criteria_value' => $subCriteria['sub_criteria_value'],
                'criterias_id' => $criteria1->id_criteria,
            ]);
        }

        // Criteria 2
        $SubCriteria2 = [
            [
                'sub_criteria_name' => 'Tidak Pernah',
                'sub_criteria_value' => 0,
            ],
            [
                'sub_criteria_name' => 'Kadang-kadang',
                'sub_criteria_value' => 1,
            ],
            [
                'sub_criteria_name' => 'Sering',
                'sub_criteria_value' => 2,
            ],
            [
                'sub_criteria_name' => 'Cukup Sering',
                'sub_criteria_value' => 3,
            ],
            [
                'sub_criteria_name' => 'Selalu',
                'sub_criteria_value' => 4,
            ],
        ];

        // sub criteria untuk Criteria 2
        $criteria2 = Criteria::where('criteria_code', 'C2')->first();
        foreach ($SubCriteria2 as $subCriteria) {
            SubCriteria::create([
                'sub_criteria_name' => $subCriteria['sub_criteria_name'],
                'sub_criteria_value' => $subCriteria['sub_criteria_value'],
                'criterias_id' => $criteria2->id_criteria,
            ]);
        }

        // Criteria 3
        $SubCriteria3 = [
            [
                'sub_criteria_name' => 'Tidak Jelas',
                'sub_criteria_value' => 30,
            ],
            [
                'sub_criteria_name' => 'Kurang Jelas',
                'sub_criteria_value' => 50,
            ],
            [
                'sub_criteria_name' => 'Jelas',
                'sub_criteria_value' => 80,
            ],
            [
                'sub_criteria_name' => 'Sangat Jelas',
                'sub_criteria_value' => 100,
            ],
        ];

        // sub criteria untuk Criteria 3
        $criteria3 = Criteria::where('criteria_code', 'C3')->first();
        foreach ($SubCriteria3 as $subCriteria) {
            SubCriteria::create([
                'sub_criteria_name' => $subCriteria['sub_criteria_name'],
                'sub_criteria_value' => $subCriteria['sub_criteria_value'],
                'criterias_id' => $criteria3->id_criteria,
            ]);
        }

        // Criteria 4
        $SubCriteria4 = [
            [
                'sub_criteria_name' => 'Tidak Sesuai',
                'sub_criteria_value' => 50,
            ],
            [
                'sub_criteria_name' => 'Sangat Sesuai',
                'sub_criteria_value' => 100,
            ],
        ];

        // sub criteria untuk Criteria 4
        $criteria4 = Criteria::where('criteria_code', 'C4')->first();
        foreach ($SubCriteria4 as $subCriteria) {
            SubCriteria::create([
                'sub_criteria_name' => $subCriteria['sub_criteria_name'],
                'sub_criteria_value' => $subCriteria['sub_criteria_value'],
                'criterias_id' => $criteria4->id_criteria,
            ]);
        }

        // Criteria 5
        $SubCriteria5 = [
            [
                'sub_criteria_name' => 'Kaku',
                'sub_criteria_value' => 50,
            ],
            [
                'sub_criteria_name' => 'Natural',
                'sub_criteria_value' => 100,
            ],
        ];

        // sub criteria untuk Criteria 5
        $criteria5 = Criteria::where('criteria_code', 'C5')->first();
        foreach ($SubCriteria5 as $subCriteria) {
            SubCriteria::create([
                'sub_criteria_name' => $subCriteria['sub_criteria_name'],
                'sub_criteria_value' => $subCriteria['sub_criteria_value'],
                'criterias_id' => $criteria5->id_criteria,
            ]);
        }
    }
}
