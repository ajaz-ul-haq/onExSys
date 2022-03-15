<?php

namespace App\Http\Controllers;

use App\Events\createAdmin;
use App\Events\createTeacher;
use App\Events\createStudent;
use App\Mail\newUserAccountMail;
use App\Mail\resetPasswwordMail;
use App\Mail\userActivationEmail;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class userController extends Controller
{

    public function gotoLink(){
        if(Session::get('type')=='admin'){
            return redirect('admin-panel');
        }
        else if(Session::get('type')=='teachers'){
            return redirect('teachers-panel');
        }
        else if(Session::get('type')=='student'){
            return redirect('student-panel');

        }
        else{
            return view('login');
        }
    }

    public function logOut(){
        Session::flush();
        return redirect('/');
    }

    public function createAdmin(Request $request)
    {
        if ($request->validate([
            'name' => 'required|min:4',
            'pass1' => 'required|min:6',
            'email' => 'required|unique:admins|unique:teachers|unique:students',
            'username' => 'required|unique:admins|min:6',
            'dob' => 'required',
            'pass2' => 'same:pass1'],

            $messages = [
                'pass1.min' => 'Password Must have at least 6 characters',
                'name.min' => 'Name Must have at least 4 characters',
                'pass1.required' => 'Password Cant be Empty',
                'name.required' => 'Name Cant be Empty',
                'username.required' => 'Username Cant be Empty',
                'email.required' => 'Email Cant be Empty',
                'dob.required' => 'Date of Birth Cant be Empty',
                'pass2.same' => 'Both Passwords must be Same',
                'username.min' => 'Username Must have at least 6 characters',
                'unique' => 'Not available'
            ])
        ) {
            $activation_token = Str::random(37);
            event(new createAdmin($request->name, $request->email, $request->username, $request->dob, $request->pass1,$activation_token));
            $this->sendAccountActivationMail($request->email,$request->name,$activation_token);

            return view('login',['response'=>'activationMessage']);
        }
    }

    public function createTeacher(Request $request)
    {
        if ($request->validate([
            'name' => 'required|min:4',
            'pass1' => 'required|min:6',
            'email' => 'required|unique:admins|unique:teachers|unique:students',
            'username' => 'required|unique:teachers|min:6',
            'dob' => 'required',
            'pass2' => 'same:pass1'],

            $messages = [
                'pass1.min' => 'Password Must have at least 6 characters',
                'name.min' => 'Name Must have at least 4 characters',
                'pass1.required' => 'Password Cant be Empty',
                'name.required' => 'Name Cant be Empty',
                'username.required' => 'Username Cant be Empty',
                'email.required' => 'Email Cant be Empty',
                'dob.required' => 'Date of Birth Cant be Empty',
                'pass2.same' => 'Both Passwords must be Same',
                'username.min' => 'Username Must have at least 6 characters',
                'unique' => 'Not available'
            ])
        ) {
            $activation_token = Str::random(37);
            event(new createTeacher($request->name, $request->email, $request->username, $request->dob, $request->pass1,$activation_token));
            $this->sendAccountActivationMail($request->email,$request->name,$activation_token);
            return view('login',['response'=>'activationMessage']);
        }
    }



    public function createStudent(Request $request)
    {
        if ($request->validate([
            'name' => 'required|min:4',
            'pass1' => 'required|min:6',
            'email' => 'required|unique:students|unique:teachers|unique:admins|min:6',
            'phone' => 'required|min:10',
            'class' => 'required|min:3',
            'roll' => 'required|min:3',
            'dob' => 'required',
            'pass2' => 'same:pass1'],

            $messages = [
                'pass1.min' => 'Password Must have at least 6 characters',
                'name.min' => 'Name Must have at least 4 characters',
                'pass1.required' => 'Password Cant be Empty',
                'name.required' => 'Name Cant be Empty',
                'phone.required' => 'Phone Cant be Empty',
                'class.required' => 'Class Cant be Empty',
                'class.min' => 'Class Must have at least 3 characters',
                'roll.min' => 'Roll No. Must have at least 3 characters',
                'email.required' => 'Email Cant be Empty',
                'dob.required' => 'Date of Birth Cant be Empty',
                'pass2.same' => 'Both Passwords must be Same',
                'phone.min' => 'Phone Must have at least 10 characters',
                'unique' => 'Email already registered'
            ])
        ) {
            $activation_token = Str::random(37);
            event(new createStudent($request->name, $request->dob, $request->email, $request->phone,$request->class, $request->roll, $request->pass1,$activation_token));
            $this->sendAccountActivationMail($request->email,$request->name,$activation_token);
            return view('login',['response'=>'activationMessage']);

        }
    }

    public function login(Request $request){
        if($request->validate([
            'email' => 'required',
            'password' => 'required',
            'dob' => 'required'],

            $messages = [
                'password.required' => 'Password Cant be Empty',
                'email.required' => 'Email Cant be Empty',
                'dob.required' => 'Date of Birth Cant be Empty'
            ])
        ) {
            $email = $request->email;
            $dob = $request->dob;
            $password = $request->password;

            $isStudent = DB::table('students')
                ->where('email', '=', $email)
                ->where('password', '=', $password)
                ->where('dob', '=', $dob)
                ->exists()?1:0;

            $isTeacher =  DB::table('teachers')
                ->where('email', '=', $email)
                ->where('password', '=', $password)
                ->where('dob', '=', $dob)
                ->exists()?1:0;
            $isAdmin = DB::table('admins')
                ->where('email', '=', $email)
                ->where('password', '=', $password)
                ->where('dob', '=', $dob)
                ->exists()?1:0;

            if($isStudent || $isTeacher || $isAdmin){
                if($isStudent){
                    $class = DB::table('students')
                        ->where('email', '=', $email)
                        ->where('password', '=', $password)
                        ->where('dob', '=', $dob)
                        ->value('class');
                    $rollNo = DB::table('students')
                        ->where('email', '=', $email)
                        ->where('password', '=', $password)
                        ->where('dob', '=', $dob)
                        ->value('class');
                    Session::put('type','student');
                    Session::put('class',$class);
                    Session::put('roll',$rollNo);
                    $table = 'students';
                }
                else if($isTeacher){
                    Session::put('type','teachers');
                    $table = 'teachers';
                }
                else{
                    Session::put('type','admin');
                    $table = 'admins';
                }

                $status = DB::table($table)->where('email','=',$email)->value('status');

                if($status!='active'){
                    return view('login',['notActivated'=>'true']);
                }
                else{
                    Session::put('email',$email);
                    Session::put('dob',$dob);
                    Session::put('password',$password);
                }



                return redirect(Session::get('type').'-panel');
            }
            else{
                return view('login',['invalidAttempt'=>'true']);
            }
        }
    }

    public function sendAccountActivationMail($email,$name,$activation_token){
        $details = [
            'name'=> $name,
            'link'=> URL::current().'/activate-account/'.$activation_token
        ];
        Mail::to($email)->send(new userActivationEmail($details));
    }


    public function activate_admin($token='invalid'){
        if($token!='invalid'){
            $id = DB::table('admins')->where('status','=',$token)->value('id');
            if($id){
                $admin= Admin::find($id);
                $admin->status = 'active';
                $admin->save();

                $master_admin = Admin::find(1)['email'];
                $details = [
                    'admin_name'=> $master_admin,
                    'name'=> $admin->name,
                    'email' => $admin->email,
                    'dob' => $admin->dob,
                    'prev' => 'admin'
                ];
                Mail::to('auhk.me@gmail.com')->send(new newUserAccountMail($details));
                return view('login',['activated'=> 'true']);
            }
            else{
                dd('Account Already activated or Account Does Not exists');
            }
        }
        else{
            dd('Invalid Account activation link,');
        }
    }

    public function activate_teacher($token='invalid'){
        if($token!='invalid'){
            $id = DB::table('teachers')->where('status','=',$token)->value('id');
            if($id){
                $teacher= Teacher::find($id);
                $teacher->status = 'active';
                $teacher->save();

                $admin = Admin::find(1)['email'];

                $details = [
                    'admin_name'=> $admin,
                    'name'=> $teacher->name,
                    'email' => $teacher->email,
                    'dob' => $teacher->dob,
                    'prev' => 'teacher'
                ];
                Mail::to($admin)->send(new newUserAccountMail($details));
                return view('login',['activated'=> 'true']);
            }
            else{
                dd('Account Already activated or Account Does Not exists');
            }
        }
        else{
            dd('Invalid Account activation link,');
        }
    }

    public function activate_student($token='invalid'){
        if($token!='invalid'){
            $id = DB::table('students')->where('status','=',$token)->value('id');
            if($id){
                $student= Student::find($id);
                $student->status = 'active';
                $student->save();
                $master_admin = Admin::find(1)['email'];
                $details = [
                    'admin_name'=> $master_admin,
                    'name'=> $student->name,
                    'email' => $student->email,
                    'dob' => $student->dob,
                    'prev' => 'student'
                ];
                Mail::to('auhk.me@gmail.com')->send(new newUserAccountMail($details));
                return view('login',['activated'=> 'true']);
            }
            else{
                dd('Account Already activated or Account Does Not exists');
            }
        }
        else{
            dd('Invalid Account activation link,');
        }
    }

    public function resetPassword(Request $request){
        if($request->validate([
            'email' => 'required',
            'dob' => 'required'],

            $messages = [
                'email.required' => 'Email Cant be Empty',
                'dob.required' => 'Date of Birth Cant be Empty'
            ])
        ){
            $email = $request->email;
            $dob = $request->dob;

            $isStudent = DB::table('students')
                ->where('email', '=', $email)
                ->where('dob', '=', $dob)
                ->exists()?1:0;

            $isTeacher =  DB::table('teachers')
                ->where('email', '=', $email)
                ->where('dob', '=', $dob)
                ->exists()?1:0;
            $isAdmin = DB::table('admins')
                ->where('email', '=', $email)
                ->where('dob', '=', $dob)
                ->exists()?1:0;

            if($isAdmin || $isStudent || $isTeacher){
                if($isAdmin){
                    $table = 'admins';
                }
                else if($isTeacher){
                    $table = 'teachers';
                }
                else{
                    $table = 'students';
                }

                $userId = DB::table($table)
                    ->where('email', '=', $email)
                    ->where('dob', '=', $dob)
                    ->value('id');
                $token = Str::random(39);

                if($isAdmin){
                    $admin = Admin::find($userId);
                    $admin->status = $token;
                    $admin->save();
                }
                elseif($isTeacher){
                    $teacher = Teacher::find($userId);
                    $teacher->status = $token;
                    $teacher->save();
                }
                else{
                    $student = Student::find($userId);
                    $student->status = $token;
                    $student->save();
                }
                $this->sendTokenLink($email,$token);
                return view('forgot-password',['tokenSent'=>'true']);
            }
            else{
                return view('forgot-password',['notExists'=>'true']);
            }
        }
    }

    public function viewNow(){
        return view('reset-password',['response'=>'positive']);
    }

    public function sendTokenLink($email,$token){
        $details = [
            'email'=> $email,
            'link'=> URL::current().'/token/'.$token
          ];
        Mail::to($email)->send(new resetPasswwordMail($details));
    }

    public function validate_token($token='null'){
        if($token!='null'){
            $isAdmin = DB::table('admins')->where('status','=',$token)->exists()?1:0;
            $isTeacher = DB::table('teachers')->where('status','=',$token)->exists()?1:0;
            $isStudent = DB::table('students')->where('status','=',$token)->exists()?1:0;

            if($isAdmin || $isTeacher || $isStudent){
                if($isAdmin){
                    $type='Admin';
                }
                elseif($isTeacher){
                    $type='Teacher';
                }
                else{
                    $type='Student';
                }
                return view('reset-password',['token'=>$token,'type'=>$type]);
            }
            else{
                dd('Invalid Token ......');
            }
        }
        else{
            dd('Token cant be NULL ....');
        }
    }


    public function change_password(Request $request){
        if($request->validate([
            'pass1' => 'required|min:8',
            'pass2' => 'same:pass1'],

            $messages = [
                'pass1.required' => 'Password Cant be Empty',
                'pass1.min' => 'Password must have at least 6 characters',
                'same' => 'Passwords doesnt match'
            ])
        ){
            $token = $request->input('token');
            $password = $request->input('pass2');
            $type = $request->input('type');
            $table = $type.'s';
            $validUser = DB::table($table)->where('status','=',$token)->value('id');
            if($validUser){
                DB::table($type.'s')->where('status','=',$token)
                    ->update(['password'=> $password,'status'=>'active']);

//            $user = $type::find($userId);
//            $user->password = $password;
//            $user->status = 'active';
//            $user->save();

                return view('reset-password',['response'=>'positive']);
            }
            else{
                return view('reset-password',['invalidToken'=>'true']);
            }
        }
    }
}
