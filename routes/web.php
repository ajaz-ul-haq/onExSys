<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminPanelController;
use App\Http\Controllers\teacherPanelController;
use App\Http\Controllers\studentPanelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[userController::class,'gotoLink']);
Route::get('/exit',[userController::class,'logOut']);
Route::get('/login',function(){
    return redirect('/');
});


Route::middleware('LoggedInAsAdmin')->group(function(){
    Route::get('admin-panel/dashboard/{show?}', [adminPanelController::class,'dashboard']);


    Route::get('/admin-panel/dashboard/admin/edit/{id?}',[adminPanelController::class,'admin_editpage']);
    Route::get('/admin-panel/dashboard/teacher/edit/{id?}',[adminPanelController::class,'teacher_editpage']);
    Route::get('/admin-panel/dashboard/student/edit/{id?}',[adminPanelController::class,'student_editpage']);

    Route::post('/admin-panel/dashboard/admin/edit',[adminPanelController::class,'admin_editor']);
    Route::post('/admin-panel/dashboard/teacher/edit',[adminPanelController::class,'teacher_editor']);
    Route::post('/admin-panel/dashboard/student/edit',[adminPanelController::class,'student_editor']);

    Route::get('/admin-panel/dashboard/teacher/delete/{id?}',[adminPanelController::class,'teacher_delete']);
    Route::get('/admin-panel/dashboard/student/delete/{id?}',[adminPanelController::class,'student_delete']);

    Route::get('/admin-panel/dashboard/view-exam/{id}',[adminPanelController::class,'view_exam']);
    Route::get('/admin-panel/dashboard/edit-exam/{pid}/{question}',[adminPanelController::class,'edit_exam']);
    Route::post('/admin-panel/dashboard/edit-exam/editNow',[adminPanelController::class,'edit_exam_Now']);
    Route::get('/admin-panel/dashboard/delete-exam/{id}',[adminPanelController::class,'delete_exam']);

    Route::get('/admin-panel/dashboard/deleteAllNotifications',[adminPanelController::class,'deleteAllNotifications']);
    Route::get('admin-panel', function (){
        return redirect('admin-panel/dashboard');
    });
});



Route::middleware('LoggedInAsTeacher')->group(function(){
    Route::get('teachers-panel/dashboard/{show?}', [teacherPanelController::class,'dashboard']);
    Route::get('teachers-panel/dashboard/view/{pid?}', [teacherPanelController::class,'view']);
    Route::get('teachers-panel/dashboard/edit/{pid?}/{question?}', [teacherPanelController::class,'edit']);
    Route::get('teachers-panel/dashboard/delete/{pid?}/{question?}', [teacherPanelController::class,'delete']);
    Route::post('teachers-panel/dashboard/editNow',[teacherPanelController::class,'editNow']);
    Route::view('teachers-panel/create', 'teachers.create');
    Route::view('teachers-panel/create/start','/');
    Route::post('teachers-panel/create/start',[teacherPanelController::class,'setBasic']);
    Route::get('teachers-panel/create/stop',[teacherPanelController::class,'stopAddingQuestion']);
    Route::post('teachers-panel/create/next',[teacherPanelController::class,'goForNextQuestion']);
    Route::get('teachers-panel', function (){
        return redirect('teachers-panel/dashboard');
    });
});

Route::middleware('LoggedInAsStudent')->group(function(){
    Route::get('/student-panel/dashboard/{show?}', [studentPanelController::class,'dashboard']);
    Route::get('/student-panel/examination/{pid?}', [studentPanelController::class,'examine']);
    Route::post('/student-panel/examination/submit',[studentPanelController::class,'showStatus']);
    Route::get('/student-panel', function (){
        return redirect('student-panel/dashboard');
    });
});


Route::middleware('notLoggedIn')->group(function(){
    Route::post('/login',[userController::class,'login']);

    Route::view('teachers-panel/signup', 'teachers.signup');
    Route::post('teachers-panel/signup',[userController::class,'createTeacher']);

    Route::view('student-panel/signup', 'students.signup');
    Route::post('student-panel/signup',[userController::class,'createStudent']);

    Route::view('admin-panel/signup', 'admin.signup');
    Route::post('admin-panel/signup',[userController::class,'createAdmin']);


    Route::get('/admin-panel/signup/activate-account/{token?}',[userController::class,'activate_admin']);
    Route::get('/teachers-panel/signup/activate-account/{token?}',[userController::class,'activate_teacher']);
    Route::get('/student-panel/signup/activate-account/{token?}',[userController::class,'activate_student']);

    Route::view('/teachers-panel/login', 'login');
    Route::view('/student-panel/login', 'login');
    Route::view('/admin-panel/login', 'login');

    Route::view('/reset-password', 'forgot-password');
    Route::post('/reset',[userController::class,'resetPassword']);
    Route::get('/reset/token/{token?}', [userController::class,'validate_token']);
    Route::post('/reset/token/{token?}', [userController::class,'change_password']);
});
