<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware('guest.admin')->group(function(){
        Route::get('/',[AdminAuthController::class,'loginShow'])->name('login.show');
        Route::post('/login',[AdminAuthController::class,'loginProcess'])->name('login.process');
        Route::get('/send',[AdminAuthController::class,'sendEamil'])->name('send.email.show');
        Route::post('/send/process',[AdminAuthController::class,'sendEmailProcess'])->name('send.email.process');
        Route::get('/verify/{token}',[AdminAuthController::class,'codeVerify'])->name('code.veryfi.show');
        Route::post('/verify/process',[AdminAuthController::class,'codeVerifyProcess'])->name('code.veryfi.process');
        Route::get('/newpass/{token}',[AdminAuthController::class,'resetPasswordShow'])->name('reset.password.show');
        Route::post('/newpass/process',[AdminAuthController::class,'resetPasswordProcess'])->name('reset.password.process');
    });

    Route::middleware('auth.admin')->group(function(){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');
        Route::get('/logout',[AdminAuthController::class,'logout'])->name('logout');



        //Subject Routers
        Route::get('/subject', [SubjectController::class,'index'])->name('subject.list');
        Route::get('/subject/create', [SubjectController::class,'create'])->name('subject.create');
        Route::get('/subject/edit/{id}', [SubjectController::class,'edit'])->name('subject.edit');
        Route::post('/subject',[SubjectController::class,'store'])->name('subject.store');
        Route::put('/subject/{id}',[SubjectController::class,'update'])->name('subject.update');
        Route::get('/subject/{id}',[SubjectController::class,'destroy'])->name('subject.destroy');


        //Teacher Router
        Route::prefix('teacher')->group(function () {
            Route::get('/', [TeacherController::class, 'index'])->name('teacher.index'); // List all teachers
            Route::get('/create', [TeacherController::class, 'create'])->name('teacher.create'); // Show form to create a new teacher
            Route::post('/', [TeacherController::class, 'store'])->name('teacher.store'); // Store new teacher
            Route::get('/{id}', [TeacherController::class, 'edit'])->name('teacher.edit'); // Show form to edit a teacher
            Route::put('/{id}', [TeacherController::class, 'update'])->name('teacher.update'); // Update a teacher
            Route::get('delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy'); // Delete a teacher
        });

        

    });
    
});