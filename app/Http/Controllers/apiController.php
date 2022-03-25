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
                        $user['name'] = "<span style='background:yellow'>".$user['name']."</span>";
                    }

                    if(preg_match('/'.$query.'/i', $user['email'])){
                        $user['email'] = "<span style='background:yellow'>".$user['email']."</span>";
                    }

                    if(preg_match('/'.$query.'/i', $user['class'])){
                        $user['class'] = "<span style='background:yellow'>".$user['class']."</span>";
                    }

                    if(preg_match('/'.$query.'/i', $user['rollno'])){
                        $user['rollno'] = "<span style='background:yellow'>".$user['rollno']."</span>";
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
}
