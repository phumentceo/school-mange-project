<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
    */
    public function run(): void
    {
        $times = [
            [
                'start_time' => '7:15AM',
                'end_time'   => '8:55AM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '9:05AM',
                'end_time'   => '9:45AM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '10:05AM',
                'end_time'   => '11:00AM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '1:00PM',
                'end_time'   => '1:45PM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '2:05PM',
                'end_time'   => '2:45PM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '3:05PM',
                'end_time'   => '4:00PM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '4:15PM',
                'end_time'   => '5:00PM',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ];


        DB::table('study_times')->insert($times);
    }
}
