<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
        // dd($request->all());

        /*
        $teacherValidated = $request->validate([
            'full_name' => ['required','string','max:255','regex:/^[\p{Khmer}\s]+$/u'],
            'latin_name' => 'required|string|max:255|regex:/^[A-Z\s]+$/',
            'gender' => 'required|in:1,2',
            'marital_status' => 'required|in:1,2',
            'dob' => 'required',
            'national_id' => 'required|string|unique:teachers,national_id',
            'subject_id' => 'required|exists:subjects,id',
            'specialization' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'university' => 'nullable|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
            'hire_date' => 'required|date',
            'note' => 'nullable|string',
        ], [
            'full_name.required' => 'សូមបញ្ចូលឈ្មោះជាភាសាខ្មែរ',
            'full_name.regex' => 'ឈ្មោះត្រូវតែជាអក្សរខ្មែរ',
            'latin_name.required' => 'សូមបញ្ចូលឈ្មោះជាភាសាអង់គ្លេស',
            'latin_name.regex' => 'ឈ្មោះជាភាសាអង់គ្លេសត្រូវតែជាអក្សរធំ',
            'gender.required' => 'សូមជ្រើសរើសភេទ',
            'gender.in' => 'ភេទត្រូវតែ 1 (ប្រុស) ឬ 2 (ស្រី)',
            'marital_status.required' => 'សូមជ្រើសរើសស្ថានភាពគ្រួសារ',
            'marital_status.in' => 'ស្ថានភាពគ្រួសារត្រូវតែ 1 (រៀបការហើយ) ឬ 2 (នៅលីវ)',
            'dob.required' => 'សូមបញ្ចូលថ្ងៃ ខែ ឆ្នាំ កំណើត',
            'national_id.required' => 'សូមបញ្ចូលលេខអត្តសញ្ញាណប័ណ្ណ',
            'national_id.unique' => 'លេខអត្តសញ្ញាណប័ណ្ណនេះមានរួចហើយ',
            'subject_id.required' => 'សូមជ្រើសរើសមុខវិជ្ជាដែលបង្រៀន',
            'subject_id.exists' => 'មុខវិជ្ជាដែលបានជ្រើសរើសមិនមាន',
            'specialization.required' => 'សូមបញ្ចូលឯកទេស',
            'degree.required' => 'សូមបញ្ចូលកំរិតវប្បធម៌',
            'university.max' => 'សាកលវិទ្យាល័យមិនអាចលើសពី 255 តួអក្សរ',
            'email.required' => 'សូមបញ្ចូលអាសយដ្ឋានអ៊ីមែល',
            'email.unique' => 'អាសយដ្ឋានអ៊ីមែលនេះមានរួចហើយ',
            'phone.required' => 'សូមបញ្ចូលលេខទូរស័ព្ទ',
            'password.min' => 'ពាក្យសម្ងាត់ត្រូវមានយ៉ាងតិច 6 តួអក្សរ',
            'hire_date.required' => 'សូមបញ្ចូលថ្ងៃចូលធ្វើការ',
            'hire_date.date' => 'ថ្ងៃចូលធ្វើការមិនត្រឹមត្រូវ',
            'note.string' => 'កំណត់ចំណាំត្រូវតែជាអក្សរ',
        ]);

        // Validation for Address
        $addressValidated = $request->validate([
            'village' => 'nullable|string|max:255',
            'commune' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'current_address' => 'nullable|string|max:255',
        ], [
            'village.string' => 'ភូមិត្រូវតែជាអក្សរ',
            'commune.string' => 'ឃុំត្រូវតែជាអក្សរ',
            'district.string' => 'ស្រុកត្រូវតែជាអក្សរ',
            'province.string' => 'ខេត្តត្រូវតែជាអក្សរ',
            'current_address.string' => 'អាសយដ្ឋានបច្ចុប្បន្នត្រូវតែជាអក្សរ',
        ]);

        */

        // Create Teacher
        $teacher = Teacher::create([
            'full_name' => 'ឈ្មោះគំរូ',
            'latin_name' => 'SAMPLE NAME',
            'gender' => 1,
            'marital_status' => 1,
            'dob' => '1990-01-01',
            'national_id' => '1234567890123',
            'subject_id' => 3,
            'specialization' => 'Math',
            'degree' => 'Bachelor',
            'university' => 'Some University',
            'email' => 'sample@example.com',
            'phone' => '1234567890',
            'password' => 'password',
            'hire_date' => '2025-01-01',
            'created_by' => Auth::guard('admin')->user()->id,
            'note' => 'Test Note',
        ]);

        // Create Address
        $teacher->addresses()->create([
            'village' => 'ភូមិត្រូវតែជាអក្សរ',
            'commune' => 'ឃុំត្រូវតែជាអក្សរ',
            'district' => 'ស្រុកត្រូវតែជាអក្សរ',
            'province' => 'ខេត្តត្រូវតែជាអក្សរ',
            'current_address' => 'អាសយដ្ឋានបច្ចុប្បន្នត្រូវតែជាអក្សរ'
        ]);

        return redirect()->route('admin.teacher.index')->with('success', 'គ្រូត្រូវបានបង្កើតដោយជោគជ័យ');
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
