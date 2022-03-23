<?php

namespace Tests\Feature;

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
    public function test_homepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
//
//    public function test_redirect_login_when_user_not_logged_in(){
//
//        $response = $this->get('/admin-panel');
//        $response->assertStatus(302);
//    }
//
//    public function test_user_email_duplication(){
//        $user1 = User::make([
//            'name'=>'Name',
//            'email'=>'user1@email.com',
//            'username'=>'username1',
//            'dob' => '1997-10-12',
//            'password'=>'password',
//        ]);
//
//        $user2 = User::make([
//            'name'=>'Name',
//            'email'=>'user2@email.com',
//            'username'=>'username2',
//            'dob' => '1997-10-12',
//            'password'=>'password',
//        ]);
//
//        $this->assertTrue($user1->email!=$user2->email);
//    }
//
//    public function test_admin_signed_up_successfully(){
//        $this->post('/admin-panel/signup',[
//            'name'=>'Name',
//            'email'=>'user1@email.com',
//            'username'=>'username1',
//            'dob' => '1997-10-12',
//            'pass1'=>'password',
//            'pass2' => 'password'
//        ]);
//
//
//        $this->assertDatabaseHas('admins',[
//            'name'=>'Name',
//            'email'=>'user1@email.com',
//            'username'=>'username1',
//            'dob' => '1997-10-12',
//            'password'=>'password',
//        ]);
//    }

}
