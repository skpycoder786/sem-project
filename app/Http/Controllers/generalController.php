<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Http\Request;
use App\Rules\SubjectTeacherRule;
use App\Rules\ValidatePasswordRule;
use Illuminate\Validation\Rule;

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
            return redirect('dashboard')->with('$user');
        }
    }
}
