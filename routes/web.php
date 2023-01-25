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

#--USER--CONTROLLER--START-HERE
Route::controller(UserController::class)->group(function () {

    Route::get('/', 'index');
    Route::get('project-details', 'ProjectDetails');
    Route::get('seminar-details', 'seminarDetails');
    Route::get('register', 'register');
    Route::post('store', 'store');
    Route::get('login', 'login');
    Route::post('auth-login', 'authLogin');
    Route::get('logout', 'logout')->name('logout');
});
#--USER--CONTROLLER--ENDS-HERE

#--STUDENT--CONTROLLER--START-HERE
Route::middleware(['web'])->group(function () {

    Route::controller(StudentController::class)->group(function () {

        Route::prefix('student')->group(function () {

            Route::get('/dashboard', 'dashboard');
            Route::get('/profile/show/{uuid}', 'showProfile');
            Route::get('/profile/edit/{uuid}', 'editProfile');
            Route::put('/profile/update/{uuid}', 'updateProfile');

            Route::post('create-seminar/{uuid}', 'createSeminar');
            Route::put('/upload/seminar/{uuid}', 'uploadSeminar');
            Route::get('/download/seminar/{seminar_file}', 'downloadSeminar');
            Route::get('seminar-details/{uuid}', 'seminarDetails');

            Route::post('create-project/{uuid}', 'createProject');
            Route::put('/upload/project/{uuid}', 'uploadProject');
            Route::get('/download/project/{project_file}', 'downloadProject');
            Route::get('project-details/{uuid}', 'projectDetails');
        });
    });
});
#--STUDENT--CONTROLLER--ENDS-HERE

#--ADMIN--CONTROLLER--START-HERE
Route::controller(AdminController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', 'dashboard');
        // Route::get('/dashboard', 'studentDashboard');
        // Route::get('/profile', 'studentProfile');
        // Route::post('/profile/edit/{uuid}', 'edit');
        // Route::post('/profile/edit/{uuid}', 'editStudent');
        // Route::update('/profile/update/{uuid}', 'update');
        // Route::update('/profile/update/{uuid}', 'updateStudent');
        // Route::post('/upload/project/{uuid}', 'uploadProject');
        // Route::get('/download/project/{uuid}', 'downloadProject');
        // Route::post('/upload/seminar/{uuid}', 'uploadSeminar');
        // Route::get('/download/seminar/{uuid}', 'downloadSeminar');
        // Route::delete('/destroy/{uuid}', 'destroy');
    });
});
#--ADMIN--CONTROLLER--ENDS-HERE
