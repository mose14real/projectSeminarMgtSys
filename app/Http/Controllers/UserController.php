<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'last_name' => ['required'],
            'matric' => ['required', 'unique:students', 'min:10', 'max:10'],
            'email' => ['required', 'unique:users'],
            'phone' => ['required', 'unique:students', 'min:11'],
            'supervisor' => ['required'],
            'session' => ['required', 'min:9', 'max:9'],
            'password' => ['required'],
            'cpassword' => ['required', 'same:password'],
        ]);

        dd($credentials);

        $user = User::create([
            'name' => $request['first_name'] . " " . $request['middle_name'] . " " . $request['last_name'],
            'email' => $request['email'],
            'role' => 'student',
            'password' =>  Hash::make($request['password'])
        ]);

        Student::create([
            'user_id' => $user->id,
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'matric' => $request['matric'],
            'phone' => $request['phone'],
            'supervisor' => $request['supervisor'],
            'session' => $request['session'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect("student.dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    public function login()
    {
        return view('login');
    }

    public function authLogin(Request $request)
    {
        $request->validate([
            'matric' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('matric', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('student.dashboard')
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Opps! You have entered invalid credentials');
    }

    public function dashboard()
    {
        if (Auth::check()) {

            return view('student.dashboard');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }


    public function logout()
    {
        //
    }
}
