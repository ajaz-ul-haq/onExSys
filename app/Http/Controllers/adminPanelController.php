<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Paper;
use App\Models\Question;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class adminPanelController extends Controller
{
    public function dashboard($show='admins'){
        if($show=='admins'){
            return view('admin.index',['admin'=>Admin::all(),'paper'=>Paper::all()]);
        }
        else if($show=='teachers'){
            return view('admin.index',['teacher'=>Teacher::all(), 'paper'=>Paper::all()]);
        }
        else if($show=='students'){
            return view('admin.index',['student'=>Student::all(), 'paper'=>Paper::all()]);
        }
        else{
            return redirect('/');
        }
    }

    public function admin_editpage($id='null'){
        if(Admin::find($id)){
                return view('admin.edit-admin',['admin'=>Admin::find($id)]);
        }
        return redirect('/admin-panel/dashboard/admins');
    }

    public function admin_editor(Request $request){
        $admin = Admin::find($request->input('admin_id'));
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->username = $request->input('username');
        $admin->dob = $request->input('dob');
        $admin->save();
        return redirect('/admin-panel/dashboard/admins');
    }


    public function teacher_editpage($id='null'){
        if(Teacher::find($id)){
                return view('admin.edit-teacher',['teacher'=>Teacher::find($id)]);
        }
        return redirect('/admin-panel/dashboard/teachers');
    }

    public function teacher_editor(Request $request){
        $teacher = Teacher::find($request->input('teacher_id'));
        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');
        $teacher->username = $request->input('username');
        $teacher->dob = $request->input('dob');
        $teacher->save();
        return redirect('/admin-panel/dashboard/teachers');
    }
    public function teacher_delete($id){
        $teacher=Teacher::find($id);
        if($teacher){
            $teacher->delete();
        }
        return redirect('/admin-panel/dashboard/teachers');
    }

    public function student_editpage($id='null'){
        if(Student::find($id)){
            return view('admin.edit-student',['student'=>Student::find($id)]);
        }
        return redirect('/admin-panel/dashboard/students');
    }

    public function student_editor(Request $request){
        $student = Student::find($request->input('student_id'));
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->dob = $request->input('dob');
        $student->class = $request->input('class');
        $student->rollno = $request->input('roll');
        $student->save();
        return redirect('/admin-panel/dashboard/students');
    }

    public function student_delete($id){
        $student=Student::find($id);
        if($student){
            $student->delete();
        }
        return redirect('/admin-panel/dashboard/students');
    }

    public function view_exam($pid = 'null'){
        if($pid != 'null'){
            $questions = Paper::find($pid)->getQuestion;
            return view('admin.exam_view_page',['questions'=>$questions]);
        }
        else{
            return redirect('/');
        }
    }

    public function edit_exam($pid = 'null',$question='null'){
        if($pid != 'null' && $question != 'null'){
            $questions = Question::find($question);
            if($questions){
                return view('admin.edit_exam_page',['questions'=>$questions]);
            }
            else{
                dd('Question Does not exists!!');
            }
        }
        else{
            return redirect('/');
        }
    }

    public function edit_exam_Now(Request $request){
        if($request->validate([
            'question' => 'required',
            'op1' => 'required',
            'op2' => 'required'],
            $messages = [
                'required' => 'Required Field'
            ])
        ){
            $quest = Question::find($request->question_id);
            $quest->question = $request->question;
            $quest->op1 = $request->op1;
            $quest->op2 = $request->op2;
            $quest->op3 = $request->op3;
            $quest->op4 = $request->op4;
            $quest->paper_id = $request->pid;
            $quest->save();

            return redirect('/admin-panel/dashboard/view-exam/'.$request->pid);
        }
    }

    public function delete_exam($pid = 'null'){
        $isValidPaper =  Paper::find($pid)?1:0;
        if($isValidPaper && $pid != 'null'){
                if((Paper::find($pid))){
                    $paper = Paper::find($pid);
                    $ques = Paper::find($pid)->getQuestion;

                    foreach($ques as $ques){
                        $ques->delete();
                    }
                    $paper->delete();
                }
                else{
                    dd('!!Unable To Delete!! ');
                }
            }
            else{
                dd('!!Trying to delete an exam which does not exists');
            }
        return redirect('/admin-panel/dashboard/');
    }
}
