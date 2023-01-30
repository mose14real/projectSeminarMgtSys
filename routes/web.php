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
    Route::get('download/{file}', 'download');
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
            Route::get('download/{file}', 'downloadAll');
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
            #--Student--
            Route::get('student-data', 'studentData');
            Route::get('profile/edit-student/{uuid}', 'editStudentProfile');
            Route::put('profile/update-student/{uuid}', 'updateStudentProfile');
            #--Project--
            Route::get('project-data', 'projectData');
            Route::get('profile/edit-project/{uuid}', 'editStudentProject');
            Route::put('profile/update-project/{uuid}', 'updateStudentProject');
            #--Seminar--
            Route::get('seminar-data', 'seminarData');
            Route::get('profile/edit-seminar/{uuid}', 'editStudentSeminar');
            Route::put('profile/update-seminar/{uuid}', 'updateStudentSeminar');
        });
    });
});
#--ENDS-HERE