<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentLevel;
use App\Models\StudyClass;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSchedule;
use App\Models\TeacherSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
         $teachers = Teacher::whereIn('id', $teacherIds)->with('levels')->get();
         
 
         return response([
             'status' => 200,
             'message' => 'Create Teacher schedule success',
             'classroom' => $studyClass,
             'teachers' => $teachers,
             
         ]);
 
    }


    public function store(){

        return response()->json([
            'status' => 200,
            'message' => 'Create success'
        ]);
    }


    



    
    
    
    
    
    
    
    


    
    
    
    

}
