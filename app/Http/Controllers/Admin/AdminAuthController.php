<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendForgotPassword;
use App\Models\Admin;
use App\Models\PasswordResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function sendEmailProccess(Request $request){

        

        $request->validate([
            'email' => 'required|email|exists:admins,email'
        ],[
            'email.required' => 'សូមបញ្ចូល Email របស់អ្នក',
            'email.email' => 'សូមបញ្ចូល Email អោយបានត្រឹមត្រូវ',
            'email.exists' => 'Email ពុំមាននៅក្នុងប្រព័ន្ធ',
        ]);

        //generate code 
        $code = mt_rand(000000,999999);

        //generate token
        $token = hash('sha256', random_bytes(30));

        PasswordResetToken::updateOrCreate(
            ['email' => $request->email],
            [
                     'token' => $token,
                     'code' => $code, 
                     'expires_at' => now()->addMinutes(15)
                ]
        );

        $admin = Admin::where('email', $request->email)->first();


        $data = [
            'name' => $admin->last_name,
            'code' => $code,
            'token' => $token,
            'email' => $request->email
            
        ];

        Mail::to($request->email)->send(new SendForgotPassword($data));

        
        return "send email success";
    }

    public function showCodeVerify(){
        return view('principal.auth.code_verify');
    }

    public function showResetPassword(){
        return view('principal.auth.new_password');
    }


}
