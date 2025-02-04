<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSubject;
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

        $subjects = Subject::all();


        // return $subjects;

        return view('principal.teachers.create',compact('subjects'));
    }

    #the function we used for store teacher to db
    public function store(Request $request){
        
        $request->validate([
            'full_name' => 'required|string|max:255|regex:/^[\p{Khmer}\s]+$/u',
            'latin_name' => 'required|string|max:255|regex:/^[A-Z\s]+$/',
            'gender' => 'required|in:1,2',
            'marital_status' => 'required|in:1,2',
            'dob' => 'required',
            'national_id' => 'nullable|string|unique:teachers,national_id',
            'subject_id' => 'required|array',
            'subject_id.*' => 'exists:subjects,id',
            'specialization' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
            'hire_date' => 'required',
            'created_by' => 'nullable|integer',
            'note' => 'nullable|string',
            'village' => 'required|string|max:255',
            'commune' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'current_address' => 'nullable|string|max:255',
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
            'national_id.unique' => 'លេខអត្តសញ្ញាណប័ណ្ណនេះមានរួចហើយ',
            'subject_id.required' => 'សូមជ្រើសរើសមុខវិជ្ជាដែលបង្រៀន',
            'subject_id.exists' => 'មុខវិជ្ជាដែលបានជ្រើសរើសមិនមាន',
            'specialization.required' => 'សូមបញ្ចូលឯកទេស',
            'degree.required' => 'សូមបញ្ចូលកំរិតវប្បធម៌',
            'university.required'  => 'សូមបញ្ចូលសាលាដែរបានបញ្ចប់ការសិក្សា',
            'university.max' => 'សាកលវិទ្យាល័យមិនអាចលើសពី 255 តួអក្សរ',
            'email.required' => 'សូមបញ្ចូលអាសយដ្ឋានអ៊ីមែល',
            'email.unique' => 'អាសយដ្ឋានអ៊ីមែលនេះមានរួចហើយ',
            'phone.required' => 'សូមបញ្ចូលលេខទូរស័ព្ទ',
            'password.min' => 'ពាក្យសម្ងាត់ត្រូវមានយ៉ាងតិច 6 តួអក្សរ',
            'hire_date.required' => 'សូមបញ្ចូលថ្ងៃចូលធ្វើការ',
            'note.string' => 'កំណត់ចំណាំត្រូវតែជាអក្សរ',
            'village.required' => 'សូមបញ្ចូលភូមិកំណើត',
            'village.string' => 'ភូមិត្រូវតែជាអក្សរ',
            'commune.required' => 'សូមបញ្ចូលឃុំ',
            'commune.string' => 'ឃុំត្រូវតែជាអក្សរ',
            'district.required' => 'សូមបញ្ចូលស្រុក',
            'district.string' => 'ស្រុកត្រូវតែជាអក្សរ',
            'province.required' => 'សូមបញ្ចូលខេត្ត',
            'province.string' => 'ខេត្តត្រូវតែជាអក្សរ',
            'current_address.string' => 'អាសយដ្ឋានបច្ចុប្បន្នត្រូវតែជាអក្សរ',
        ]);


        // Create the teacher
        $teacher = Teacher::create($request->only([
            "full_name",
            "latin_name",
            "gender",
            "marital_status",
            "dob",
            "national_id",
            "specialization",
            "degree",
            "university",
            "email",
            "phone",
            "password",
            "hire_date",
            "created_by",
            "note"
        ]));

        // Create the address
        $teacher->addresses()->create($request->only([
            'village',
            'commune',
            'district',
            'province',
            'current_address'
        ]));

        $subjectIds = $request->subject_id;

        foreach($subjectIds as $subject){
            TeacherSubject::create([
                'teacher_id' => $teacher->id,
                'subject_id' => $subject,
            ]);
        }


        return redirect()->route('admin.teacher.index')->with('success','គ្រូបង្រៀនត្រូវបានបង្កើតដោយជោគជ័យ');

    
       
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

        $teacher = Teacher::find($id);

        //delete from addressable 
        $teacher->addresses()->delete();

        $teacher->delete();

        return redirect()->back()->with('success','គ្រូបង្រៀនត្រូវបានដកចេញពីប្រព័ន្ធដោយជោគជ័យ');

        
    }

    
}
