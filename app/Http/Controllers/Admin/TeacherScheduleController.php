<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentLevel;
use App\Models\StudyClass;
use App\Models\Subject;
use App\Models\TeacheHours;
use App\Models\Teacher;
use App\Models\TeacherSchedule;
use App\Models\TeacherSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TeacherScheduleController extends Controller
{

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


    
    public function create(Request $request){

        
        // Select class with level relationship
         $studyClass = StudyClass::where('id', $request->id)->with('level')->first();
 
 
 
         // Select teachers who teach subjects for the same level(s) as the class
         $teacherLevels = TeacherSubject::whereHas('levels', function($query) use ($studyClass) {
             $query->where('id', $studyClass->level->id);
         })->get();
 
 
         // Extract teacher IDs
         $teacherIds = $teacherLevels->pluck('teacher_id')->toArray();
 
         // Select all teachers with those teacher IDs
         $teachers = Teacher::whereIn('id', $teacherIds)->with(['levels','subjects'])->get();
         
 
         return response([
             'status' => 200,
             'message' => 'Create Teacher schedule success',
             'classroom' => $studyClass,
             'teachers' => $teachers,
             
         ]);
 
    }



 



    public function store(Request $request){


        $validator = Validator::make($request->all(),[
            'day' =>'required',
            'study_class_id' =>'required',
            'student_level_id' => 'required',
            'teacher_id' =>'required',
            'subject_id' =>'required',
            'study_time_id' => 'required'
        ]);

    
        if($validator->fails()){
            return response()->json([
               'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }
        
        TeacherSchedule::create([
            'day' => $request->day,
            'study_class_id' => $request->study_class_id,
            'teacher_id' => $request->teacher_id,
            'subject_id' => $request->subject_id,
            'student_level_id' => $request->student_level_id,
            'study_time_id' => $request->study_time_id,
        ]);
        
        // Check if the teacher already exists in the TeacheHours table
        $teacherHours = TeacheHours::where('teacher_id', $request->teacher_id)->first();
        
        if ($teacherHours) {
            // If exists, increment spent_hours by 1
            $teacherHours->increment('spent_hours', 1);
        } else {
            // If not exists, create a new record with spent_hours set to 1
            TeacheHours::create([
                'teacher_id' => $request->teacher_id,
                'spent_hours' => 1,
            ]);
        }


        return response()->json([
            'status' => 200,
            'message' => 'Create success'
        ]);

    }



    public function getSubjects($teacherId)
    {
        $teacher = Teacher::with('subjects')->find($teacherId);

        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }


        return response()->json([
           'subjects' => $teacher->subjects,
        ]);

        // return response()->json([
        //     'subjects' => $teacher->subjects->map(function ($subject) {
        //         return [
        //             'id' => $subject->id,
        //             'name' => $subject->name,
        //         ];
        //     })
        // ]);
    }


}
