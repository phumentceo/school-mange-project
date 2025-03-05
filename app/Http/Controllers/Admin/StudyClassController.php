<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentLevel;
use App\Models\StudyClass;
use App\Models\StudyTime;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudyClassController extends Controller
{
    
    public function index()
    {
        $classes = StudyClass::with('teacher')->get();
        $studyTimes = StudyTime::all();

        return view('principal.classes.list',compact('classes','studyTimes'));
    }

    
    public function create()
    {

        $levels = StudentLevel::all();
        $teachers = Teacher::all();
        
        return view('principal.classes.create',compact('teachers','levels'));
    }

   
    public function store(Request $request)
    {
        
    }


    public function view(string $id)
    {
        
        //teacher = teacher homeroom , teachers = teacher_class (Pivat table) 
        $data = StudyClass::where('id',$id)->with(['teacher','teachers'])->first();


        // return $data;

        return view('principal.classes.view',compact('data'));
    }

   
    public function edit(string $id)
    {
        
    }

   
    public function update(Request $request, string $id)
    {
        
    }

   
    public function destroy(string $id)
    {
       
    }
}
