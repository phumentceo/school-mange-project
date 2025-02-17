<?php

namespace Database\Seeders;

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
            'គណិតវិទ្យា', 'ភាសាខ្មែរ', 'រូបវិទ្យា', 'គីមីវិទ្យា', 'ជីវវិទ្យា',
            'ផែនដីវិទ្យា', 'ភូមិវិទ្យា', 'ប្រវត្តិវិទ្យា', 'ភាសាបរទេស', 'សីលធម៌-ពលរដ្ជវិទ្យា', 'កីឡា'
        ];

        $hours = [
            "គណិតវិទ្យា"        => 6,
            "ភាសាខ្មែរ"        => 6,
            "រូបវិទ្យា"        => 4,
            "គីមីវិទ្យា"        => 4,
            "ជីវវិទ្យា"        => 3,
            "ផែនដីវិទ្យា"     => 2,
            "ភូមិវិទ្យា"       => 2,
            "ប្រវត្តិវិទ្យា"   => 2,
            "ភាសាបរទេស"     => 3,
            "សីលធម៌-ពលរដ្ជវិទ្យា" => 2,
            "កីឡា"            => 1,
        ];

        $grades = DB::table('student_levels')->pluck('id')->toArray();
        $subjectTypes = [1, 2, 3];

        $data = [];

        foreach ($grades as $grade) {
            foreach ($subjects as $subject) {
                $data[] = [
                    'subject_name'   => $subject,
                    'subject_type'   => $subjectTypes[array_rand($subjectTypes)],
                    'credit'         => rand(50, 150),
                    'hours_per_week' => $hours[$subject] ?? 2,
                    'grade'          => $grade,
                    'book_number'    => rand(100, 400),
                    'note'           => null,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ];
            }
        }

        // Insert all data in one query for better performance
        DB::table('subjects')->insert($data);
    }
}
