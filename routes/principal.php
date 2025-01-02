<?php

use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[AdminAuthController::class,'showLogin'])->name('login.show');
    Route::post('/login',[AdminAuthController::class,'loginProcess'])->name('login.process');
    Route::get('/send',[AdminAuthController::class,'showEmailSend'])->name('send.email');
    Route::get('/verify',[AdminAuthController::class,'showCodeVerify'])->name('verify.show');
    Route::get('/reset',[AdminAuthController::class,'showResetPassword'])->name('reset.show');  
});