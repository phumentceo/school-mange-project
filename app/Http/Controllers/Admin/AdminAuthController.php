<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
