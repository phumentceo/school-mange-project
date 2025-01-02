<?php

use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[AdminAuthController::class,'loginShow'])->name('login.show');
    Route::post('/login',[AdminAuthController::class,'loginProcess'])->name('login.process');
});