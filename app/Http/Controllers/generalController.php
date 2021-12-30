<?php

namespace App\Http\Controllers;

use App\Mail\SendOTPMail;
use App\Models\attendance;
use App\Models\student;
use App\Models\studentSubject;
use App\Models\teacher;
use App\Models\teacher_todo;
use Illuminate\Http\Request;
use App\Rules\SubjectTeacherRule;
use App\Rules\ValidatePasswordRule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;

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
            session(['id' => $user->id, 'subject' => $req->M1_Subject_inp]);
            return redirect('dashboard');
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

    public function addStudent(Request $req) {
        $exists = student::where('email', $req->email)->orWhere('rollNo', $req->rollNo)->first();
        if($exists) {
            return response()->json([
                'error' => 'Student already exists.'
            ]);
        } else {
            $path = base_path();
            $result = passthru('python ' . base_path() . '/trainModel.py '.$path.' '.$req->rollNo);
            $data = [
                'name'   => $req->name,
                'email'  => $req->email,
                'rollNo' => $req->rollNo
            ];
            $add = student::create($data);
            $add2 = studentSubject::create([
                'subject' => $req->session()->get('subject'),
                'student_id' => $add->id
            ]);
            if($add && $add2) {
                return response()->json([
                    'msg' => 'Student has been added successfully.'
                ]);
            }
        }
    }

    public function takeAttendance() {
        $path = base_path();
        $result = json_decode(passthru('python ' . base_path() . '/detect.py '.$path));
        print_r($result);
        exit();
    }

    public function storeAttendance(Request $req) {
        $faces = $req->faces;
        $data = [
            'date'       => Carbon::today(),
            'students'   => json_encode($faces),
            'subject'    => $req->session()->get('subject'),
            'teacher_id' => $req->session()->get('id')
        ];
        $add = attendance::create($data);
        if($add) {
            return response()->json([
                'msg' => 'Attendance has been stored successfully.',
            ]);
        } else {
            return response()->json([
                'error' => 'Attendance has been stored successfully.',
            ]);
        }
    }

    // public function removeStudent(request $req) {
    //     $getStudent = student::where('email', $req->email);
    //     if($getStudent->first()) {
    //         $getStudent->delete();
    //         return response()->json([
    //             'msg' => 'Student has been removed from this subject.',
    //         ]);
    //     }
    // }

    public function fetchStudent(Request $req) {
        return Excel::download(new StudentExport, 'students.xlsx');
    }

}
