<?php

namespace Database\Seeders;

use App\Models\StudentLevels;
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
            ['name' => '7'],
            ['name' => '8'],
            ['name' => '9'],
            ['name' => '10'],
            ['name' => '11'],
            ['name' => '12']
        ];

        DB::table('student_levels')->insert($levels);
    }
}
