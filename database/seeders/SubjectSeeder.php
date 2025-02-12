<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            'គណិតវិទ្យា', 'រូបវិទ្យា', 'គីមីវិទ្យា', 'ជីវវិទ្យា', 'ផែនដីវិទ្យា',
            'ភូមិវិទ្យា', 'ប្រវត្តិវិទ្យា', 'ភាសាបរទេស', 'សីលធម៌-ពលរដ្ជវិទ្យា', 'កីឡា'
        ];

        $grades = DB::table('student_levels')->pluck('id')->toArray();

        $subjectTypes = [1, 2, 3];

        $data = [];
        
        foreach ($grades as $grade) {
            foreach ($subjects as $subject) {
                $data[] = [
                    'subject_name' => $subject,
                    'subject_type' => array_rand(array_flip($subjectTypes)),
                    'credit' => rand(50, 150),
                    'grade' => $grade,
                    'book_number' => rand(100, 400),
                    'note' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('subjects')->insert($data);
    }
}
