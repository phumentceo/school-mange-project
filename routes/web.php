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


//Guardian Router


//Message contact routers
Route::get('/contact',function(){
    return view('principal.contacts.contact');
});
