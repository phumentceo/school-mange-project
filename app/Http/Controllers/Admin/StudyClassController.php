<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentLevel;
use App\Models\StudyClass;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudyClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('principal.classes.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        $levels = StudentLevel::all();

        $teachers = Teacher::all();
        
        return view('principal.classes.create',compact('teachers','levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'homeroom_teacher' => 'required|exists:teachers,id',
            'level_id' => 'required|exists:student_levels,id',
            'desk' => 'required|integer|min:1',
            'fan' => 'nullable|string|max:255',
            'whiteboard' => 'required|integer|min:1',
            'light' => 'nullable|string|max:255',
            'note' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'សូមបំពេញឈ្មោះបន្ទប់រៀន។',
            'name.max' => 'ឈ្មោះបន្ទប់រៀនមិនអាចលើស 255 តួអក្សរ។',
            'homeroom_teacher.required' => 'សូមជ្រើសរើសគ្រូបន្ទុកថ្នាក់។',
            'homeroom_teacher.exists' => 'គ្រូបន្ទុកថ្នាក់មិនមានក្នុងប្រព័ន្ធ។',
            'level_id.required' => 'សូមជ្រើសរើសកំរិតថ្នាក់។',
            'level_id.exists' => 'កំរិតថ្នាក់ដែលបានជ្រើសរើសមិនត្រឹមត្រូវ។',
            'desk.required' => 'សូមបំពេញចំនួនកៅអី។',
            'desk.integer' => 'ចំនួនកៅអីត្រូវតែជាលេខ។',
            'desk.min' => 'ចំនួនកៅអីត្រូវតែមានយ៉ាងហោចណាស់ ១។',
            'whiteboard.required' => 'សូមជ្រើសរើសចំនួនក្តារខៀន។',
            'whiteboard.integer' => 'ចំនួនក្តារខៀនត្រូវតែជាលេខ។',
            'whiteboard.min' => 'ចំនួនក្តារខៀនយ៉ាងហោចណាស់ត្រូវតែមាន ១។',
            'fan.max' => 'ព័ត៌មានអំពីកង្ហារមិនអាចលើស 255 តួអក្សរ។',
            'light.max' => 'ព័ត៌មានអំពីអំពូលភ្លើងមិនអាចលើស 255 តួអក្សរ។',
            'note.max' => 'ផ្សេងៗមិនអាចលើស 1000 តួអក្សរ។',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create new class
        StudyClass::create([
            'name' => $request->name,
            'homeroom_teacher' => $request->homeroom_teacher,
            'level_id' => $request->level_id,
            'desk' => $request->desk,
            'fan' => $request->fan,
            'whiteboard' => $request->whiteboard,
            'light' => $request->light,
            'note' => $request->note,
        ]);     

        return redirect()->route('admin.class.index')->with('success', 'បន្ទប់រៀនត្រូវបានបង្កើតដោយជោគជ័យ!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
