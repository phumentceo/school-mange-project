<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                "name" => "7A",
                "class_level_id" => 1,
                "teacher_id" => 1,
            ]
        ];
    }
}
