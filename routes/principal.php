<?php

use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[AdminAuthController::class,'loginShow'])->name('login.show');
    Route::post('/login',[AdminAuthController::class,'loginProcess'])->name('login.process');
    Route::get('/send',[AdminAuthController::class,'sendEamil'])->name('send.email.show');
    Route::post('/send/process',[AdminAuthController::class,'sendEmailProcess'])->name('send.email.process');
    Route::get('/verify/{token}',[AdminAuthController::class,'codeVerify'])->name('code.veryfi.show');
    Route::post('/verify/process',[AdminAuthController::class,'codeVerifyProcess'])->name('code.veryfi.process');
    Route::get('/newpass/{token}',[AdminAuthController::class,'resetPasswordShow'])->name('reset.password.show');
    Route::post('/newpass/process',[AdminAuthController::class,'resetPasswordProcess'])->name('reset.password.process');
});