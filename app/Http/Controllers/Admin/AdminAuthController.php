<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\sendForgotPassword;
use App\Models\Admin;
use App\Models\PasswordResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminAuthController extends Controller
{
    public function loginShow(){
        return view('principal.auth.login');
    }

    public function loginProcess(Request $request){

      
        $request->validate([
            'email' => ['required','email'],
            'password'=> ['required']
        ],[
            'email.required' => 'សូមបញ្ចូលអ៊ីមែល។',
            'email.email' => 'អ៊ីមែលដែលបានបញ្ចូលមិនត្រឹមត្រូវទេ។',
            'password.required' => 'សូមបញ្ចូលពាក្យសម្ងាត់។'


        ]);


        $credentials = $request->only('email', 'password');

        $remember = $request->has('remember_me') ? true : false;

        if(Auth::guard('admin')->attempt($credentials,$remember)){
            return  "Login True";
        }else{
            return redirect()->back()->with('error','អ៊ីមែល ឬ ពាក្យសម្ងាត់របស់អ្នកមិនត្រឹមត្រូវនោះទេ។');
        }


    }

    public function sendEamil(){
        return view('principal.auth.send_email');
    }

    public function sendEmailProcess(Request $request){


        $request->validate([
            'email' => 'required|email|exists:admins,email'
        ],[
            'email.required' => 'សូមបញ្ចូល Email របស់អ្នក',
            'email.email' => 'សូមបញ្ចូល Email អោយបានត្រឹមត្រូវ',
            'email.exists' => 'Email ពុំមាននៅក្នុងប្រព័ន្ធ',
        ]);

        $code = mt_rand(000000,999999);

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

        Mail::to($request->email)->send(new sendForgotPassword($data));
        

       
        return redirect()->route('admin.code.veryfi.show',[
            'token' => $token
        ]);


    }

    public function codeVerify(string $token){

        $data = PasswordResetToken::where('token', $token)->first();

        //check expires_at
        if($data && $data->expires_at > now()){
            return view('teacher.auth.code_verify', compact('data'));
        }

        return redirect()->route('admin.send.email.show')->with('error','Code របស់អ្នកត្រូវបានផុតកំណត់');
    }
}
