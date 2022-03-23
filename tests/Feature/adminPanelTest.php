<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Paper;
use App\Models\Question;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class adminPanelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /* URL Testing */


    public function test_admin_can_login()
    {
        $admin = Admin::factory()->create();
        $response =$this->post('/login',[
            'email'=> $admin['email'],
            'dob'=> $admin['dob'],
            'password'=>$admin['password']
        ]);
        $response->assertRedirect('/admin-panel/');
    }


    public function test_admin_will_be_redirected_to_dashboard_after_log_in(){
        $admin = Admin::factory()->create();
        $this->post('/login',[
            'email'=> $admin['email'],
            'dob'=>$admin['dob'],
            'password'=>$admin['password']
        ]);

        $response = $this->get('/admin-panel/');
        $response->assertRedirect('/admin-panel/dashboard');
    }

    public function test_admin_can_edit_any_teacher(){
        $admin = Admin::factory()->create();
        $this->post('/login',[
            'email'=> $admin['email'],
            'dob'=>$admin['dob'],
            'password'=>$admin['password']
        ]);

        $teacher = Teacher::factory()->create();
        $teacher_to_edit = $teacher->id;

        $this->post('/admin-panel/dashboard/teacher/edit',[
            'teacher_id'=> $teacher_to_edit,
            'name' => 'UpdatedContent',
            'email' => 'Updated Content',
            'username' => 'Updated Content',
            'password' => 'Updated Content',
            'dob' => '1997-10-12',
        ]);

        $this->assertDatabaseHas('teachers',[
            'id'=> $teacher_to_edit,
            'name' => 'UpdatedContent',
            'email' => 'Updated Content',
            'username' => 'Updated Content',
            'dob' => '1997-10-12',
        ]);
    }


    public function test_admin_can_delete_any_teacher(){
        $admin = Admin::factory()->create();
        $this->post('/login',[
            'email'=> $admin['email'],
            'dob'=>$admin['dob'],
            'password'=>$admin['password']
        ]);

        $teacher_to_delete = Teacher::factory()->create()->id;
        $this->get('/admin-panel/dashboard/teacher/delete/'.$teacher_to_delete);
        $this->assertDatabaseMissing('teachers',['id' => $teacher_to_delete] );
    }


    public function test_admin_can_edit_any_student(){
        $admin = Admin::factory()->create();
        $this->post('/login',[
            'email'=> $admin['email'],
            'dob'=>$admin['dob'],
            'password'=>$admin['password']
        ]);

        $student = Student::factory()->create();
        $student_to_edit = $student->id;

        $this->post('/admin-panel/dashboard/student/edit',[
            'student_id'=> $student_to_edit,
            'name' => 'UpdatedContent',
            'email' => 'Updated Content',
            'dob' => '1997-10-12',
            'phone' => '00000000',
            'class' => '0th',
            'roll' => '000',
            'password' => 'Updated Content',
        ]);

        $this->assertDatabaseHas('students',[
            'id'=> $student_to_edit,
            'phone' => '00000000',
            'class' => '0th',
            'rollno' => '000',
        ]);
    }

    public function test_admin_can_delete_any_student(){
        $admin = Admin::factory()->create();
        $this->post('/login',[
            'email'=> $admin['email'],
            'dob'=>$admin['dob'],
            'password'=>$admin['password']
        ]);

        $student_to_delete = Teacher::factory()->create()->id;
        $this->get('/admin-panel/dashboard/student/delete/'.$student_to_delete);
        $this->assertDatabaseMissing('students',['id' => $student_to_delete] );
    }



    public function test_admin_can_view_any_exam(){
        $admin = Admin::factory()->create();
        $this->post('/login',[
            'email'=> $admin['email'],
            'dob'=>$admin['dob'],
            'password'=>$admin['password']
        ]);

        $exam_to_view = Paper::factory()->create()->id;
        $response = $this->get('/admin-panel/dashboard/view-exam/'.$exam_to_view);
        $response->assertStatus(200);
    }

    public function test_admin_can_edit_any_exam(){
        $admin = Admin::factory()->create();
        $this->post('/login',[
            'email'=> $admin['email'],
            'dob'=>$admin['dob'],
            'password'=>$admin['password']
        ]);

        $question = Question::factory()->create();
        $question_to_edit = $question->id;

        $this->post('/admin-panel/dashboard/edit-exam/editNow',[
            'question_id'=> $question_to_edit,
            'question' => 'Updated  Question',
            'op1' => 'Updated Content',
            'op2' => 'Updated Content',
            'op3' => 'Updated Content',
            'op4' => 'Updated Content',
            'pid' => $question['paper_id'],
        ]);

        $this->assertDatabaseHas('questions',[
            'id'=> $question_to_edit,
            'question' => 'Updated  Question',
        ]);
    }

    public function test_admin_can_delete_any_exam(){
        $admin = Admin::factory()->create();
        $this->post('/login',[
            'email'=> $admin['email'],
            'dob'=>$admin['dob'],
            'password'=>$admin['password']
        ]);

        $exam_to_delete = Paper::factory()->create()->id;
        $this->get('/admin-panel/dashboard/delete-exam/'.$exam_to_delete);
        $this->assertDatabaseMissing('papers',['id' => $exam_to_delete] );
    }


}
