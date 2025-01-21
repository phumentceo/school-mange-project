<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{


    #the function we used for show teachers list
    public function index(){

        $teachers = Teacher::all();

        return view('principal.teachers.list',compact('teachers'));

    }


    #the function we used for show creating new teacher
    public function create(){

        return view('principal.teachers.create');
    }

    #the function we used for store teacher to db
    public function store(Request $request){

    }


    #the function we used for show updating teacher
    public function edit($id){

        return view('principal.teachers.edit');
    }

    #the function wd used  for updating teacher
    public  function update(Request $request,$id){

    }


    #the function we used for teacher deleting
    public function destroy($id){

    }

    
}
