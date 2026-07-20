<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name'       => 'Design & UI',
                'slug'       => 'design-and-ui',
                'created_at' => Carbon::create(2026, 5, 1, 9, 0, 0),
            ],
            [
                'name'       => 'Développement Back-End',
                'slug'       => 'developpement-back-end',
                'created_at' => Carbon::create(2026, 5, 1, 9, 0, 0),
            ],
            [
                'name'       => 'Intégration Front-End',
                'slug'       => 'integration-front-end',
                'created_at' => Carbon::create(2026, 5, 1, 9, 0, 0),
            ],
            [
                'name'       => 'Productivité & Workspace',
                'slug'       => 'productivite-and-workspace',
                'created_at' => Carbon::create(2026, 5, 1, 9, 0, 0),
            ],
        ];

        DB::table('categories')->insert($categories);
    }

}
