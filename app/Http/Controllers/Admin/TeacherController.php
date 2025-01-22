<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    
    public function index()
    {
        $teachers = Teacher::all();
        return view('principal.teachers.list', compact('teachers'));
    }


    public function create()
    {
        return view('principal.teachers.create');
    }

    public function store(Request $request){
        
        $teacherValidated = $request->validate([
            'full_name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\p{Khmer}\s]+$/u'
            ],
            'latin_name' => 'required|string|max:255|regex:/^[A-Z\s]+$/',
            'gender' => 'required|in:1,2',
            'marital_status' => 'required|in:1,2',
            'dob' => 'nullable|date',
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
            'dob.date' => 'ថ្ងៃខែឆ្នាំកំណើតមិនត្រឹមត្រូវ',
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

        // Create Teacher
        $teacher = Teacher::create($teacherValidated);

        // Create Address
        $teacher->addresses()->create($addressValidated);

        return redirect()->route('admin.teacher.index')->with('success', 'គ្រូត្រូវបានបង្កើតដោយជោគជ័យ');
    }


    public function edit(Teacher $teacher)
    {
        return view('principal.teachers.edit', compact('teacher'));
    }

    
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:1,2',
            'marital_status' => 'required|in:1,2',
            'dob' => 'nullable|date',
            'national_id' => 'required|string|unique:teachers,national_id,' . $teacher->id,
            'subject_id' => 'required|exists:subjects,id',
            'specialization' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'university' => 'nullable|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone_number' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
            'hire_date' => 'required|date',
            'note' => 'nullable|string',
        ], [
            // Same Khmer validation messages as in the store method
        ]);

        $teacher->update($validated);
        return redirect()->route('admin.teacher.index')->with('success', 'គ្រូត្រូវបានកែប្រែដោយជោគជ័យ');
    }

    
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'គ្រូត្រូវបានលុបដោយជោគជ័យ');
    }
}
