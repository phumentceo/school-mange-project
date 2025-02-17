<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();
        // Fetch all necessary IDs
        $adminIds = DB::table('admins')->pluck('id')->toArray();
        $subjectIds = DB::table('subjects')->pluck('id')->toArray();
        $studentLevels = DB::table('student_levels')->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $teacher = Teacher::create([
                'full_name' => $faker->name,
                'latin_name' => $faker->firstName,
                'gender' => $faker->randomElement([1, 2]),
                'marital_status' => $faker->randomElement([1, 2]),
                'dob' => $faker->date(),
                'national_id' => $faker->unique()->numerify('###########'),
                'specialization' => $faker->word,
                'degree' => $faker->randomElement(['បរិញ្ញាប័ត្រ', 'បរិញ្ញាប័ត្រ', 'បរិញ្ញាប័ត្រ']),
                'university' => $faker->company,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'password' => Hash::make('password'),
                'created_by' => $faker->randomElement($adminIds),
                'hire_date' => $faker->date(),
                'note' => $faker->sentence,
                'email_verified_at' => now(),
                'remember_token' => $faker->md5,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Attach subjects **with student level**
            $subjectsToAttach = $faker->randomElements($subjectIds, rand(1, 3)); // Attach 1-3 subjects
            foreach ($subjectsToAttach as $subjectId) {
                DB::table('teacher_subjects')->insert([
                    'teacher_id' => $teacher->id,
                    'subject_id' => $subjectId,
                    'student_level_id' => $faker->randomElement($studentLevels), // Assign a random student level
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

    }
}
