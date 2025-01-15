<?php

use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('/',[AdminAuthController::class,'showLogin'])->name('login.show');
    Route::post('/login',[AdminAuthController::class,'loginProcess'])->name('login.process');

    Route::get('/send',[AdminAuthController::class,'showEmailSend'])->name('send.email');
    Route::post('/send/process',[AdminAuthController::class,'sendEmailProccess'])->name('send.email.process');

    Route::get('/verify/{token}',[AdminAuthController::class,'showCodeVerify'])->name('verify.show');
    Route::post('/verify/process',[AdminAuthController::class,'codeVerifyProcess'])->name('verify.process');

    Route::get('/reset-pass/{token}',[AdminAuthController::class,'showResetPassword'])->name('reset.show'); 
    Route::post('/reset-pass/process',[AdminAuthController::class,'resetPasswordProcess'])->name('reset.password.process'); 
    
});