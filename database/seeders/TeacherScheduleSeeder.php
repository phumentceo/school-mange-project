<?php

namespace Database\Seeders;

use App\Models\StudentLevel;
use App\Models\StudyClass;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSchedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class TeacherScheduleSeeder extends Seeder
{
    public function run()
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $timeSlots = [
            ['07:00:00', '08:00:00'],
            ['08:00:00', '09:00:00'],
            ['09:00:00', '10:00:00'],
            ['10:00:00', '11:00:00'],
            ['14:00:00', '15:00:00'],
            ['15:00:00', '16:00:00']
        ];

        $teachers = Teacher::all();
        $classrooms = StudyClass::all();
        $gradeLevels = StudentLevel::whereBetween('name', ["7", "12"])->get();

        $subjectHoursPerWeek = [];
        $subjects = Subject::all();
        foreach ($subjects as $subject) {
            $subjectHoursPerWeek[$subject->subject_name] = (int)$subject->hours_per_week;
        }

        $teacherHours = [];
        TeacherSchedule::truncate();  // Clear previous schedules

        $incompleteSchedules = []; // To store issues related to teacher availability

        foreach ($gradeLevels as $grade) {
            $subjectHours = $subjectHoursPerWeek;
            $subjects = Subject::where('grade', $grade->id)->get();

            foreach ($days as $day) {
                foreach ($timeSlots as $slot) {
                    foreach ($subjects as $subject) {
                        if ($subjectHours[$subject->subject_name] <= 0) continue;

                        // Find available teachers
                        $availableTeachers = $teachers->filter(function ($t) use ($subject, $teacherHours) {
                            return $t->subjects->contains($subject) &&
                                (!isset($teacherHours[$t->id]) || $teacherHours[$t->id] < 20);
                        });

                        if ($availableTeachers->isEmpty()) {
                            $incompleteSchedules[] = [
                                'grade_level' => $grade->name,
                                'subject' => $subject->subject_name,
                                'day' => $day,
                                'slot' => $slot,
                                'message' => 'No available teachers for this subject.'
                            ];
                            continue;
                        }

                        $teacher = $availableTeachers->random();
                        $classroom = $classrooms->where('class_level_id', $grade->id)->random();

                        if (!$teacher || !$subject || !$classroom || !$grade) {
                            Log::error("Missing Data: ", [
                                'teacher' => $teacher?->id,
                                'subject' => $subject?->id,
                                'classroom' => $classroom?->id,
                                'grade' => $grade?->id
                            ]);
                            continue;
                        }

                        TeacherSchedule::create([
                            'teacher_id' => $teacher->id,
                            'subject_id' => $subject->id,
                            'study_class_id' => $classroom->id,
                            'student_level_id' => $grade->id,
                            'day' => $day,
                            'start_time' => $slot[0],
                            'end_time' => $slot[1]
                        ]);

                        $teacherHours[$teacher->id] = ($teacherHours[$teacher->id] ?? 0) + 1;
                        $subjectHours[$subject->subject_name] -= 1;
                    }
                }
            }
        }

        if (!empty($incompleteSchedules)) {
            Log::warning('Incomplete Schedules', $incompleteSchedules);
        }
    }
}

