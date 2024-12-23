<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal.dashboard');
});


//Subject Routers
Route::get('/subject',function(){
    return view('principal.subjects.list');
});
Route::get('/subject/create',function(){
    return view('principal.subjects.create');
});
Route::get('/subject/edit',function(){
    return view('principal.subjects.edit');
});
Route::get('/subject/view',function(){
    return view('principal.subjects.view');
});



//Teachers Routers
Route::get('/teacher',function(){
    return view('principal.teachers.list');
});
Route::get('/teacher/create',function(){
    return view('principal.teachers.create');
});
Route::get('/teacher/edit',function(){
    return view('principal.teachers.edit');
});

Route::get('/teacher/view',function(){
    return view('principal.teachers.view');
});



//Routers classes
Route::get('/class',function(){
    return view('principal.classes.list');
});
Route::get('/class/create',function(){
    return view('principal.classes.create');
});
Route::get('/class/edit',function(){
    return view('principal.classes.edit');
});

Route::get('/class/view',function(){
    return view('principal.classes.view');
});



//Teachers Routers
Route::get('/student',function(){
    return view('principal.students.list');
});
Route::get('/student/create',function(){
    return view('principal.students.create');
});
Route::get('/student/edit',function(){
    return view('principal.students.edit');
});

Route::get('/student/view',function(){
    return view('principal.students.view');
});

// Profle
Route::get('/profile',function(){
    return view('principal.profile.profile');
});

//Setting 
Route::get('/setting',function(){
    return view('principal.setting.setting');
});


Route::get('/login',function(){
    return view('principal.login');
});

//Message contact routers
Route::get('/contact',function(){
    return view('principal.contacts.contact');
});



//---------------Teacher Router start--------------------//
Route::get('/teacher/dashboard',function(){
    return view('teacher.dashboard');
});

//Guardian Router
Route::get('/tearcher/parent',function(){
    return view('teacher.student_parrent.list');
});
Route::get('/tearcher/parent/create',function(){
    return view('teacher.student_parrent.create');
});
Route::get('/tearcher/parent/edit',function(){
    return view('principal.guardian.edit');
});


//---------------Teacher Router end--------------------//


