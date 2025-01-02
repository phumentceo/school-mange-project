<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function loginShow(){
        return view('principal.auth.login');
    }

    public function loginProcess(Request $request){
        
    }
}
