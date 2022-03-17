<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Paper;
use App\Models\Student;
use App\Models\Mark;
use App\Notifications\newExamSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class studentPanelController extends Controller
{
    public function dashboard($show='all'){
        if($show =='for-me'){
            $myPaper = Paper::where('class','=',Session::get('class'))->get();
            return view('students.index',['paper'=>$myPaper,'user'=>'self']);
        }
        else if($show =='submitted'){
            $paper = Paper::where('class','=',Session::get('class'))->get();
            return view('students.index', ['paper' => $paper,'responded'=>'true']);
        }
       else {
            $paper = Paper::all();
            return view('students.index', ['paper' => $paper]);
        }
    }

    public function examine($pid='null'){
        if(($pid != 'null')){
            if( DB::table('papers')->where('id','=',$pid)->exists()){
                if(DB::table('papers')->where('id','=',$pid)->value('class') == Session::get('class')){
                    $questions = Paper::find($pid)->getQuestion;
                    Session::put('now_solving',$pid);
                    return view('students.testpage',['questions'=>$questions]);
                }
                else{
                    dd('This Question paper is not designed for your Class');
                }
            }
            else{
                dd('Invalid Paper!');
            }
        }
        else{
            return redirect('/student-panel/dashboard');
        }
    }

    public function showStatus(Request $req){
        if(!Session::has('now_solving')){
            echo "<div class='holder'><a href='/'>Back to Dashboard</a></div>";
            dd("You had already responded to this test!!");
        }

        $questions = Paper::find(Session::get('now_solving'))->getQuestion;
        $correct_question = [];
        $current_question = 1;
        $correct_answers=0;
        foreach($questions as $question){
            $response = $req->input("q".$current_question);
            if($question['true'] == $response){
                $correct_answers++;
                array_push($correct_question, $current_question);
            }
            else if($response ==''){
                array_push($correct_question, '404');
            }
            else{
                array_push($correct_question, '502');
            }
            $current_question++;
        }

        $marks = new Mark;
        $marks->paper_id = Session::get('now_solving');
        $marks->student_id = DB::table('students')->where('email','=',Session::get('email'))->value('id');
        $marks->marks = $correct_answers/($current_question-1) * 100;
        $marks->created_at = Carbon::Now();
        $marks->updated_at = Carbon::Now();
        $marks->save();

        $student_name = DB::table('students')->where('email','=',Session::get('email'))->value('name');
        $subject = Paper::find(Session::get('now_solving'))['subject'];
        $class = Paper::find(Session::get('now_solving'))['class'];

        $admin = Admin::find(1);
        $admin->notify(new newExamSubmitted($student_name, $subject,$class));
        return view('students.testpage',['questions'=>$questions, 'correct_question'=>$correct_question]);
    }
}
