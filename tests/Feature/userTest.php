<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class userTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage_is_working_fine()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_admin_will_be_redirected_to_admin_panel_if_logged_in(){
        $response = $this->withSession(['type'=>'admin'])->get('/');
        $response->assertRedirect('/admin-panel/');
    }

    public function test_teacher_will_be_redirected_to_teacher_panel_if_logged_in(){
        $response = $this->withSession(['type'=>'teachers'])->get('/');
        $response->assertRedirect('/teachers-panel/');
    }



    public function test_student_will_be_redirected_to_student_panel_if_logged_in(){
        $response = $this->withSession(['type'=>'student'])->get('/');
        $response->assertRedirect('/student-panel/');
    }

    public function test_sends_account_activation_email_when_admin_signs_up(){
        $admin = Admin::factory()->create();
        $response = $this->post('/admin-panel/signup',[
            'name'=> $admin['name'],
            'email'=> $admin['email'],
            'username'=> $admin['username'],
            'pass1'=> $admin['password'],
            'pass2'=> $admin['password'],
            'dob'=> $admin['dob'],
        ]);

        $this->assertDatabaseHas('admins',['email'=> $admin['email']]);

        $response->assertRedirect('/');
    }
    public function test_sends_account_activation_email_when_teacher_signs_up(){
        $teacher = Teacher::factory()->create();
        $response = $this->post('/teachers-panel/signup',[
            'name'=> $teacher['name'],
            'email'=> $teacher['email'],
            'username'=> $teacher['username'],
            'pass1'=> $teacher['password'],
            'pass2'=> $teacher['password'],
            'dob'=> $teacher['dob'],
        ]);

        $this->assertDatabaseHas('teachers',['email'=> $teacher['email']]);

        $response->assertRedirect('/');
    }

    public function test_sends_account_activation_email_when_student_signs_up(){
        $student = Student::factory()->create();
        $response = $this->post('/student-panel/signup',[
            'name'=> $student['name'],
            'email'=> $student['email'],
            'phone'=> $student['phone'],
            'class'=> $student['class'],
            'roll'=> $student['rollno'],
            'pass1'=> $student['password'],
            'pass2'=> $student['password'],
            'dob'=> $student['dob'],
        ]);

        $this->assertDatabaseHas('students',['email'=> $student['email']]);

        $response->assertRedirect('/');

    }
}
