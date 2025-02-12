<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $adminIds = DB::table('admins')->pluck('id')->toArray();

        $teachers = [];

        for ($i = 0; $i < 50; $i++) {
            $teachers[] = [
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
            ];
        }

        DB::table('teachers')->insert($teachers);
    }
}
