<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class apiController extends Controller
{

    public function searchAdmin($query=''){ $data = Admin::where('email', 'LIKE', '%'. $query. '%')
        ->orwhere('name', 'LIKE', '%'. $query. '%')
        ->orwhere('username', 'LIKE', '%'. $query. '%')
        ->get();
        $content= count($data).' Results Found... <tr>
      <th>Name</th>
      <th>Email</th>
      <th>D.0.B</th>
      <th>Username</th>
      <th>Registered On</th>
    </tr>';
        if(count($data)>0){
            foreach($data as $user){
                if($query!=''){
                    if(preg_match('/'.$query.'/i', $user['name'])){
                        $user['name'] = "<span style='background:yellow'>".$user['name']."</span>";
                    }

                    if(preg_match('/'.$query.'/i', $user['email'])){
                        $user['email'] = "<span style='background:yellow'>".$user['email']."</span>";
                    }

                    if(preg_match('/'.$query.'/i', $user['username'])){
                        $user['username'] = "<span style='background:yellow'>".$user['username']."</span>";
                    }
                }

                $content = $content.'<tr>
                               <td>'.$user['name'].'</td>
                               <td>'.$user['email'].'</td>
                               <td>'.$user['dob'].'</td>
                               <td>'.$user['username'].'</td>
                               <td>'.$user['created_at'].'</td>
                             </tr>';
            }
        }
        else $content ='No Record Found';
        return $content;
    }

    public function searchTeacher($query=''){
        $data = Teacher::where('email', 'LIKE', '%'. $query. '%')
        ->orwhere('name', 'LIKE', '%'. $query. '%')
        ->orwhere('username', 'LIKE', '%'. $query. '%')
        ->get();
        $content= count($data).' Results Found... <tr>
      <th>Name</th>
      <th>Email</th>
      <th>D.0.B</th>
      <th>Username</th>
      <th>Registered On</th>
    </tr>';
        if(count($data)>0){
            foreach($data as $user){
                if($query!=''){
                    if(preg_match('/'.$query.'/i', $user['name'])){
                        $user['name'] = "<span style='background:yellow'>".$user['name']."</span>";
                    }

                    if(preg_match('/'.$query.'/i', $user['email'])){
                        $user['email'] = "<span style='background:yellow'>".$user['email']."</span>";
                    }

                    if(preg_match('/'.$query.'/i', $user['username'])){
                        $user['username'] = "<span style='background:yellow'>".$user['username']."</span>";
                    }
                }

                $content = $content.'<tr>
                               <td>'.$user['name'].'</td>
                               <td>'.$user['email'].'</td>
                               <td>'.$user['dob'].'</td>
                               <td>'.$user['username'].'</td>
                               <td>'.$user['created_at'].'</td>
                             </tr>';
            }
        }
        else $content ='No Record Found';
        return $content;
    }


    public function searchStudent($query=''){
        $data = Student::where('email', 'LIKE', '%'. $query. '%')
            ->orwhere('name', 'LIKE', '%'. $query. '%')
            ->orwhere('class', 'LIKE', '%'. $query. '%')
            ->orwhere('rollno', 'LIKE', '%'. $query. '%')
            ->get();
        $content = count($data).' Results Found... <tr>
      <th>Name</th>
      <th>Email</th>
      <th>D.0.B</th>
      <th>Class</th>
      <th>Roll No</th>
      <th>Registered On</th>
    </tr>';
        if(count($data)>0){
            foreach($data as $user){
                if($query!=''){
                    if(preg_match('/'.$query.'/i', $user['name'])){
                        $user['name'] = $this->getFormattedText($user['name'],$this->getQueryLocation($query,$user['name']),strlen($query));
                    }

                    if(preg_match('/'.$query.'/i', $user['email'])){
                        $user['email'] = $this->getFormattedText($user['email'],$this->getQueryLocation($query,$user['email']),strlen($query));
                    }

                    if(preg_match('/'.$query.'/i', $user['class'])){
                        $user['class'] = $this->getFormattedText($user['email'],$this->getQueryLocation($query,$user['class']),strlen($query));
                    }

                    if(preg_match('/'.$query.'/i', $user['rollno'])){
                        $user['rollno'] = $this->getFormattedText($user['rollno'],$this->getQueryLocation($query,$user['rollno']),strlen($query));
                    }
                }

                $content = $content.'<tr>
                               <td>'.$user['name'].'</td>
                               <td>'.$user['email'].'</td>
                               <td>'.$user['dob'].'</td>
                               <td>'.$user['class'].'</td>
                               <td>'.$user['rollno'].'</td>
                               <td>'.$user['created_at'].'</td>
                             </tr>';
            }
        }
        else $content ='No Record Found';
        return $content;
    }

    public function getQueryLocation($query, $word){
        for($i=0; $i<strlen($word); $i++){
            if($word[$i]==$query[0]){
                if(strcmp(substr($word,$i,strlen($query)),$query)==0){
                    return $i;
                };
            }
        }
    }

    public function getFormattedText($word,$location,$length){
        $wordPart1=$wordPart2=$wordPart3="";
        $i=0;$j=0;

        for($i=0; $i<$location; $i++){
            $wordPart1[$j]=  $word[$i];
            ++$j;
        }
        $j=0;
        for($i=$location; $i<$location+$length; $i++){
            $wordPart2[$j]=  $word[$i];
            ++$j;
        }
        $j=0;
        for($i=$location+$length; $i<strlen($word); $i++){
            $wordPart3[$j]=  $word[$i];
            $j++;
        }

        return "$wordPart1<span style='background:yellow;'>$wordPart2</span>$wordPart3";
    }
}
