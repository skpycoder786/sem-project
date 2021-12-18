<?php

namespace App\Http\Controllers;

use App\Mail\SendOTPMail;
use App\Models\teacher;
use Illuminate\Http\Request;
use App\Rules\SubjectTeacherRule;
use App\Rules\ValidatePasswordRule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;

class generalController extends Controller
{
    //
    public function login(Request $req) {
        
        $this->validate($req,[
            'M1_Email_inp'    => ['required', Rule::exists('teacher', 'email')],
            'M1_Password_inp' => ['required', new ValidatePasswordRule($req->M1_Email_inp)],
            'M1_Subject_inp'  => ['required', new SubjectTeacherRule($req->M1_Email_inp) ]
        ]);

        $user = teacher::where('email', $req->M1_Email_inp)->first();
        if($user) {
            $user['msg'] = 'Login Successfull';
            // return redirect('dashboard')->with(compact('user'));
            // return Redirect::route('generalController.dashboard')->with(['user' => $user]);
            return view('dashboard')->with(compact('user'));
        }
    }

    Public function sendOTP(Request $req) {
        $this->validate($req,[
            'email'    => ['required', Rule::exists('teacher', 'email')],
        ]);
        $user = teacher::where('email', $req->email)->first();
        $otp = mt_rand(100000,999999);
        $body = [
            'name'  => $user->name,
            'otp'   => $otp
        ];
        Mail::to($req->email)->send(new SendOTPMail($body));
        return response()->json([
            'otp' => $otp
        ]);
    }
}
