<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin(){
        return view('principal.auth.login');
    }

    public function loginProcess(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' =>  'required'
        ],[
            'email.required' => 'សូមបញ្ចូលអសដ្ឋានអ៊ីម៉ែលរបស់អ្នក',
            'email.email' => 'សូមបញ្ចូលអសដ្ឋានអ៊ីម៉ែលដែរត្រឹមត្រូវ',
            'password.required' => 'សូមបញ្ចូលលេខកូដសម្ងាត់របស់អ្នក'
        ]);

    }

    public function showEmailSend(){
        return view('principal.auth.send_email');
    }

    public function showCodeVerify(){
        return view('principal.auth.code_verify');
    }

    public function showResetPassword(){
        return view('principal.auth.new_password');
    }


}
