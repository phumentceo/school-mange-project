<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudyClassSeeder extends Seeder
{
   
    public function run(): void
    {
        $faker = Faker::create();

        $levels = DB::table('student_levels')->get();
        $teachers = DB::table('teachers')->pluck('id')->toArray();
        $sections = ['A', 'B', 'C', 'D'];

        $classes = [];

        foreach ($levels as $level) {
            foreach ($sections as $section) {
                $classes[] = [
                    'name' => $level->name . $section,
                    'class_level_id' => $level->id,
                    'homeroom_teacher' => $faker->randomElement($teachers),
                    'desk' => 10,
                    'fan' => $faker->randomElement([1, 2, 3]),
                    'whiteboard' => 1,
                    'status' => 1,
                    'note' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('study_classes')->insert($classes);
    }
    
}
