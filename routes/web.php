<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(StudentController::class)->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('details', 'projectDetails');

    Route::prefix('student')->group(function () {

        Route::get('/register', 'register');

        Route::post('/store', 'store');

        Route::get('/login', 'login');

        Route::post('auth-login', 'authLogin');

        Route::get('/dashboard', 'dashboard');

        Route::get('/profile', 'profile');

        // Route::post('/profile/edit/{id}', 'editProfile');

        // Route::update('/profile/update/{id}', 'updateProfile');

        // Route::post('/upload/project/{id}', 'uploadProject');

        // Route::get('/download/project{id}', 'downloadProject');

        // Route::post('/upload/seminar/{id}', 'uploadSeminar');

        // Route::get('/download/seminar/{id}', 'downloadSeminar');

        // Route::get('/logout', 'studentLogout');
    });
});

Route::controller(AdminController::class)->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', 'index');

        Route::get('details', 'details');

        Route::get('/register', 'register');

        Route::post('/store', 'store');

        Route::get('/login', 'login');

        Route::post('auth-login', 'authLogin');

        Route::get('/dashboard', 'dashboard');

        // Route::get('/dashboard', 'studentDashboard');

        Route::get('/profile', 'profile');

        // Route::get('/profile', 'studentProfile');

        // Route::post('/profile/edit/{id}', 'edit');

        // Route::post('/profile/edit/{id}', 'editStudent');

        // Route::update('/profile/update/{id}', 'update');

        // Route::update('/profile/update/{id}', 'updateStudent');

        // Route::post('/upload/project/{id}', 'uploadProject');

        // Route::get('/download/project/{id}', 'downloadProject');

        // Route::post('/upload/seminar/{id}', 'uploadSeminar');

        // Route::get('/download/seminar/{id}', 'downloadSeminar');

        // Route::delete('/destroy/{id}', 'destroy');

        // Route::get('/logout', 'logout');
    });
});
