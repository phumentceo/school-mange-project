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

    public function create(Request $request){

        
       // Select class with level relationship
        $studyClass = StudyClass::where('id', $request->id)->with('level')->first();



        // Select teachers who teach subjects for the same level(s) as the class
        $teachers = TeacherSubject::whereHas('levels', function($query) use ($studyClass) {
            $query->whereIn('id', $studyClass->level->pluck('id'));
        })->get();

        //Select all teacher name 
        

        

        return response([
            'status' => 200,
            'message' => 'Create Teacher schedule success',
            'classroom' => $studyClass,
            'teachers' => $teachers
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


    
    
    
    
    
    
    
    


    
    
    
    

}
