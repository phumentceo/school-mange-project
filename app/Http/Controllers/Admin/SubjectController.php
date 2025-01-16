<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{

    #the function we used for subject list
    public function index(){
        return view('principal.subjects.list');
    }

    #the function we used for show creating new subject
    public function create(){
        return view('principal.subjects.create');
    }

    #the function we used for saving new subject
    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'subject_name' => 'required|string|max:255',
            'subject_type' => 'required|in:1,2,3',
            'credit'       => 'required|integer|min:0',
            'grade'        => 'required|string|max:255',
            'book_number'  => 'nullable|integer|min:0',
            'note'         => 'nullable|string',
        ], [
            'subject_name.required' => 'ឈ្មោះមុខវិជ្ជា គឺត្រូវតែបញ្ជាក់។',
            'subject_type.required' => 'ប្រភេទមុខវិជ្ជា គឺត្រូវតែបញ្ជាក់។',
            'subject_type.in'       => 'ប្រភេទមុខវិជ្ជា គឺត្រូវតែជាប្រភេទ 1, 2, ឬ 3 ប៉ុណ្ណោះ។',
            'credit.required'       => 'ពិន្ទុសរុបសម្រាប់មុខវិជ្ជា គឺត្រូវតែបញ្ជាក់។',
            'grade.required'        => 'កំរិតថ្នាក់ គឺត្រូវតែបញ្ជាក់។',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new subject
        Subject::create($request->all());

        return redirect()->route('subjects.index')
            ->with('success', 'បង្កើតមុខវិជ្ជាបានជោគជ័យ');
    }

    #the function we used for show editting subject
    public function edit($id){
        
    }

    #the function we used for updating subject
    public function update(Request $request, $id){
        
    }

    #the function we used for deleting subject
    public function destroy($id){
        
    }

    
}
