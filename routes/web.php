<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

#--USERS--START-HERE
Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('project-details/{uuid}', 'ProjectDetailsAll');
    Route::get('seminar-details/{uuid}', 'seminarDetailsAll');
    Route::get('download/{file}', 'downloadProSem');
    Route::get('register', 'register');
    Route::post('store', 'store');
    Route::get('login', 'login')->name('login');
    Route::post('auth-login', 'authLogin');
    Route::get('logout', 'logout')->name('logout');
});
#--ENDS-HERE

#--STUDENT--START-HERE
Route::middleware(['auth'])->group(function () {
    Route::controller(StudentController::class)->group(function () {
        Route::prefix('student')->group(function () {
            Route::get('dashboard', 'dashboard');
            Route::get('profile/show/{uuid}', 'showProfile');
            Route::get('profile/edit/{uuid}', 'editProfile');
            Route::put('profile/update/{uuid}', 'updateProfile');
            Route::get('download/{file}', 'downloadProSem');
            #--Seminar--
            Route::post('create-seminar/{uuid}', 'createSeminar');
            Route::put('upload/seminar/{uuid}', 'uploadSeminar');
            Route::get('seminar-details/{uuid}', 'seminarDetails');
            #--Project--
            Route::post('create-project/{uuid}', 'createProject');
            Route::put('upload/project/{uuid}', 'uploadProject');
            Route::get('project-details/{uuid}', 'projectDetails');
        });
    });
});
#----ENDS-HERE

#--ADMIN--START-HERE
Route::middleware(['auth', 'admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('dashboard', 'dashboard');
            Route::get('profile/show/{uuid}', 'showProfile');
            Route::get('profile/edit/{uuid}', 'editProfile');
            Route::put('profile/update/{uuid}', 'updateProfile');
            Route::get('download/{file}', 'downloadProSem');
            #--Student--
            Route::get('student-data', 'studentData');
            Route::get('edit-student/{uuid}', 'editStudentProfile');
            Route::put('update-student/{uuid}', 'updateStudentProfile');
            Route::delete('delete/student/{uuid}', 'deleteStudent');
            #--Project--
            Route::get('project-data', 'projectData');
            Route::get('edit-project/{uuid}', 'editStudentProject');
            Route::put('update-project/{uuid}', 'updateStudentProject');
            Route::put('upload/project/{uuid}', 'uploadStudentProject');
            Route::delete('delete/project/{uuid}', 'deleteStudentProject');
            #--Seminar--
            Route::get('seminar-data', 'seminarData');
            Route::get('edit-seminar/{uuid}', 'editStudentSeminar');
            Route::put('update-seminar/{uuid}', 'updateStudentSeminar');
            Route::put('upload/project/{uuid}', 'uploadStudentSeminar');
            Route::delete('delete/seminar/{uuid}', 'deleteStudentSeminar');
        });
    });
});
#--ENDS-HERE