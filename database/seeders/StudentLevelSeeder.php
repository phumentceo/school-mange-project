<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                "name" => '7',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => '8',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => '9',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => '10',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => '11',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => '12',
                "created_at" => now(),
                "updated_at" => now(),
            ]
        ];

        DB::table('student_levels')->insert($levels);
    }
}
