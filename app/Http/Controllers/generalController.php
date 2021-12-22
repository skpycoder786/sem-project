<?php

namespace App\Http\Controllers;

use App\Mail\SendOTPMail;
use App\Models\teacher;
use App\Models\teacher_todo;
use Illuminate\Http\Request;
use App\Rules\SubjectTeacherRule;
use App\Rules\ValidatePasswordRule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
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
            Session()->forget('expire');
            session(['id' => $user->id]);
            return redirect('dashboard');
            // return Redirect::route('generalController.dashboard')->with(['user' => $user]);
            // return view('dashboard')->with(compact('user', 'to_do'));
        }
    }

    public function dashboard(Request $req) {
        $id = $req->session()->get('id');
        $user = teacher::where('id', $id)->first();
        
        $to_do = teacher_todo::where('teacher_id', $id)
            ->whereDate('created_at', Carbon::today())->get();
        return view('dashboard')->with(compact('user', 'to_do'));

    }

    public function sendOTP(Request $req) {
        $user = teacher::where('email', $req->email)->first();
        if($user) {
            $otp = mt_rand(100000,999999);
            $body = [
                'name'  => $user->name,
                'otp'   => $otp
            ];
            Mail::to($req->email)->send(new SendOTPMail($body));
            return response()->json([
                'otp' => $otp
            ]);
        } else {
            return response()->json([
                'msg' => 'User does not exist.'
            ]);
        }
    }

    public function confirmPass(Request $req) {
        if($req->newPass && $req->confirmPass) {
            if($req->newPass == $req->confirmPass) {
                $setPass = teacher::where('email', $req->email)->update([
                    'password' => Hash::make($req->newPass)
                ]);
                if($setPass) {
                    return response()->json([
                        'msg' => 'Password has been updated'
                    ]);
                } else {
                    return response()->json([
                        'error' => 'Some problem occured. Please try again in some time'
                    ]);
                }
            } else {
                return response()->json([
                    'error' => 'Both password fields must be same.'
                ]);
            }
        } else {
            return response()->json([
                'error' => 'Both password fields must not be empty.'
            ]);
        }
    }

    public function addTask(Request $req) {
        $id = $req->session()->get('id');
        $insert = [
            'task' => $req->task,
            'teacher_id' => $id,
            'status' => 2
        ];
        $q = teacher_todo::create($insert);
        $logs = teacher_todo::where('teacher_id', $id)
            ->whereDate('created_at', Carbon::today())->get();
        if($q) {
            return response()->json([
                'msg' => 'Task has been added successfully.',
                'data' => $logs
            ]);
        }
        return response()->json([
            'error' => 'Some error occurred. Please try again later.'
        ]);
    }

    public function updateStatus(Request $req) {
        $log = teacher_todo::where('id', $req->id);
        if($log) {
            $log->update([
                'status' => 1
            ]);
            $logs = teacher_todo::where('teacher_id', session()->get('id'))
            ->whereDate('created_at', Carbon::today())->get();
            return response()->json([
                'msg' => 'Task status has been updated.',
                'data' => $logs
            ]);
        } else {
            return response()->json([
                'error' => 'Either task does not exist or some problem occurred.'
            ]);
        }
    }

    public function deleteTask(Request $req) {
        $log = teacher_todo::where('id', $req->id);
        if($log) {
            $log->delete();
            $logs = teacher_todo::where('teacher_id', session()->get('id'))
            ->whereDate('created_at', Carbon::today())->get();
            return response()->json([
                'msg' => 'Task status has been updated.',
                'data' => $logs
            ]);
        } else {
            return response()->json([
                'error' => 'Either task does not exist or some problem occurred.'
            ]);
        }
    }

}
