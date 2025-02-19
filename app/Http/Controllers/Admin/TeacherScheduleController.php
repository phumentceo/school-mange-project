<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentLevel;
use App\Models\StudyClass;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TeacherScheduleController extends Controller
{

    public function create(){

        return response([
            'status' => 200,
            'message' => 'Create Teacher schedule success',
        ]);

    }



    public function index(){



        return view('principal.setting.setting');


    }


    public function list(){


        $schedule7A = TeacherSchedule::where('study_class_id',73)
                    ->where('day','Monday')
                    ->with(['teacher','subject','classroom'])->get();


        

        return $schedule7A;

       


        return view('principal.setting.schedule.list',compact('schedule7A'));
    }


    public function schedule() {
        $days = ['ច័ន្ទ', 'អង្គារ', 'ពុធ', 'ព្រ.ហ', 'សុក្រ', 'សៅរ៍'];
        $timeSlots = [
            ['07:00:00', '08:00:00'],
            ['08:00:00', '09:00:00'],
            ['09:00:00', '10:00:00'],
            ['10:00:00', '11:00:00'],
            ['14:00:00', '15:00:00'],
            ['15:00:00', '16:00:00']
        ];
    
        $grade = StudentLevel::where('name', 7)->first();
        if (!$grade) return "Grade 7 not found.";
    
        $subjects = Subject::where('grade', $grade->id)->get();
        if ($subjects->isEmpty()) return "No subjects found for grade 7!";
    
        $teachers = Teacher::whereHas('subjects', function ($query) use ($subjects) {
            $query->whereIn('subjects.id', $subjects->pluck('id'));
        })->get();
    
        $classrooms = StudyClass::where('class_level_id', $grade->id)->get();
    
        // Initialize hour tracking
        $subjectHoursRemaining = $subjects->pluck('hours_per_week', 'id')->toArray();
        $teacherHours = [];
        $subjectTeacherNeeds = [];
    
        // Clear old schedule
        TeacherSchedule::where('student_level_id', $grade->id)->delete();
    
        // Distribute hours evenly across days
        foreach ($days as $day) {
            $availableSubjects = collect($subjects);
            foreach ($timeSlots as $slot) {
                $availableSubjects = $availableSubjects->filter(fn($s) => ($subjectHoursRemaining[$s->id] ?? 0) > 0);
                if ($availableSubjects->isEmpty()) break;
    
                // Sort subjects by remaining hours to balance distribution
                $availableSubjects = $availableSubjects->sortByDesc(fn($s) => $subjectHoursRemaining[$s->id] ?? 0);
                $subject = $availableSubjects->first();
    
                if (!$subject || ($subjectHoursRemaining[$subject->id] ?? 0) <= 0) continue;
    
                // Find available teacher
                $availableTeachers = $teachers->filter(function ($t) use ($subject, $teacherHours) {
                    return $t->subjects->pluck('id')->contains($subject->id) && 
                           (!isset($teacherHours[$t->id]) || $teacherHours[$t->id] < 20);
                });
    
                if ($availableTeachers->isEmpty()) {
                    $subjectTeacherNeeds[$subject->id]['subject'] = $subject->subject_name;
                    $subjectTeacherNeeds[$subject->id]['needed_teachers'] = ($subjectTeacherNeeds[$subject->id]['needed_teachers'] ?? 0) + 1;
                    continue;
                }
    
                $teacher = $availableTeachers->random();
                $classroom = $classrooms->random();
    
                // Create schedule
                TeacherSchedule::create([
                    'teacher_id' => $teacher->id,
                    'subject_id' => $subject->id,
                    'study_class_id' => $classroom->id,
                    'student_level_id' => $grade->id,
                    'day' => $day,
                    'start_time' => $slot[0],
                    'end_time' => $slot[1]
                ]);
    
                // Update tracking variables
                $teacherHours[$teacher->id] = ($teacherHours[$teacher->id] ?? 0) + 1;
                $subjectHoursRemaining[$subject->id] -= 1;
    
                if ($subjectHoursRemaining[$subject->id] <= 0) {
                    $availableSubjects = $availableSubjects->reject(fn($s) => $s->id === $subject->id);
                }
            }
        }
    
        // Display summary of subjects that need more teachers
        if (!empty($subjectTeacherNeeds)) {
            echo "\n🔴 **មុខវិជ្ជាដែលត្រូវការគ្រូបន្ថែម**:\n";
            foreach ($subjectTeacherNeeds as $data) {
                echo "📌 មុខវិជ្ជា: {$data['subject']} | ត្រូវការគ្រូ: {$data['needed_teachers']} \n";
            }
        }
    
        return "Schedule creation successful!";
    }
    
    
    
    
    
    
    


    
    
    
    

}
