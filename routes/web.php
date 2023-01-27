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
    Route::get('login', 'login');
    Route::post('auth-login', 'authLogin');
    Route::get('logout', 'logout')->name('logout');
});
#--ENDS-HERE

#--STUDENT--START-HERE
Route::middleware(['web'])->group(function () {
    Route::controller(StudentController::class)->group(function () {
        Route::prefix('student')->group(function () {
            Route::get('/dashboard', 'dashboard');
            Route::get('/profile/show/{uuid}', 'showProfile');
            Route::get('/profile/edit/{uuid}', 'editProfile');
            Route::put('/profile/update/{uuid}', 'updateProfile');
            Route::get('/download/{file}', 'downloadAll');

            Route::post('create-seminar/{uuid}', 'createSeminar');
            Route::put('/upload/seminar/{uuid}', 'uploadSeminar');
            Route::get('seminar-details/{uuid}', 'seminarDetails');

            Route::post('create-project/{uuid}', 'createProject');
            Route::put('/upload/project/{uuid}', 'uploadProject');
            Route::get('project-details/{uuid}', 'projectDetails');
        });
    });
});
#----ENDS-HERE

#--ADMIN--START-HERE
Route::controller(AdminController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', 'dashboard');
        Route::get('/project-data', 'projectData');
        Route::get('/student-data', 'studentData');
        Route::get('/seminar-data', 'seminarData');
        // Route::post('/profile/edit/{uuid}', 'edit');
        // Route::update('/profile/update/{uuid}', 'update');
        // Route::get('/download/{file}', 'downloadAny');
        // Route::delete('/destroy/{uuid}', 'destroy');

        // Route::get('/profile', 'studentProfile');
        // Route::post('/profile/edit/{uuid}', 'editStudent');
        // Route::update('/profile/update/{uuid}', 'updateStudent');
        // Route::post('/upload/seminar/{uuid}', 'uploadStudentSeminar');
        // Route::post('/upload/project/{uuid}', 'uploadStudentProject');
    });
});
#--ENDS-HERE