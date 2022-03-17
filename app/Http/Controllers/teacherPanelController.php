<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Paper;
use App\Models\Question;
use App\Models\Student;
use App\Notifications\newExamNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class teacherPanelController extends Controller
{

    public function view($pid = 'null'){
        if($pid != 'null'){
            $questions = Paper::find($pid)->getQuestion;
            return view('teachers.view',['questions'=>$questions]);
        }
        else{
            return redirect('/');
        }
    }

    public function edit($pid = 'null',$question ='null'){
        if($pid != 'null' && $question != 'null'){
            $questions = Question::find($question);
            return view('teachers.edit',['questions'=>$questions]);
        }
        else{
            return redirect('/');
        }
    }

    public function delete($pid = 'null'){
        $isValidPaper =  Paper::find($pid)?1:0;

        if($isValidPaper && $pid != 'null'){
            $paperToDelete = Paper::find($pid);
            if($paperToDelete->creator == Session::get('email')){
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
                dd('!!You dont have permissions to delete the Content!! ');
                }
            }
        else{
            dd('Oops!!...... Invalid Parameter Passed to delete the item.');
        }
        return redirect('/teachers-panel/dashboard/created-by-me');
    }

    public function editNow(Request $request){
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

            return redirect('/teachers-panel/dashboard/view/'.$request->pid);
        }
    }



    public function dashboard($show = 'all'){
        if($show =='created-by-me'){
            $myPaper = Paper::where('creator','=',Session::get('email'))->get();
            return view('teachers.index',['paper'=>$myPaper,'creator'=>'me']);
        }
        else{
            $paper = Paper::all();
            return view('teachers.index',['paper'=>$paper]);
        }
    }

    public function setBasic(Request $request){
        if ($request->validate([
            'class' => 'required',
            'subject' => 'required',
            'time' => 'required'])
        ){
            if(!DB::table('papers')
                ->where('subject', '=', $request->subject)
                ->where('class', '=', $request->class)
                ->where('time', '=', $request->time)
                ->exists()){

                $paper = new Paper;
                $paper->subject = $request->subject;
                $paper->class = $request->class;
                $paper->time = $request->time;
                $paper->creator = Session::get('email');
                $paper->save();

                $teacher = DB::table('teachers')->where('email','=',Session::get('email'))->value('name');

                $admin =Admin::find(1);
                $admin->notify(new newExamNotification($teacher,$request->subject,$request->class));


            }

            $pid = DB::table('papers')
                ->where('subject', '=', $request->subject)
                ->where('class', '=', $request->class)
                ->where('time', '=', $request->time)
                ->value('id');

            Session::put('class',$request->class);
            Session::put('subject',$request->subject);
            Session::put('time',$request->time);
            Session::put('pid',$pid);

            return view("teachers.create");
        }
    }

    public function goForNextQuestion(Request $request){
        if($request->validate([
            'question' => 'required',
            'op1' => 'required',
            'op2' => 'required'],
        $messages = [
            'required' => 'Required Field'
        ])
        ){
            $quest = new Question;
            $quest->question = $request->question;
            $quest->op1 = $request->op1;
            $quest->op2 = $request->op2;
            $quest->op3 = $request->op3;
            $quest->op4 = $request->op4;
            $quest->true = $request->type;
            $quest->paper_id = Session::get('pid');
            $quest->save();

            return redirect('/teachers-panel/create/');


        }
    }
    public function stopAddingQuestion(){
        Session::pull('class');
        Session::pull('subject');
        Session::pull('time');

        return redirect('/');
    }

}
