<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Seminar;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function details()
    {
        return view('details');
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
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
        $user = User::create([
            'uuid' => Str::orderedUuid(),
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'role' => 'student',
            'password' =>  Hash::make($request['password'])
        ]);
        $student = Student::create([
            'uuid' => Str::orderedUuid(),
            'user_id' => $user->id,
            'matric' => $request['matric'],
            'phone' => $request['phone'],
            'supervisor' => $request['supervisor'],
            'session' => $request['session'],
        ]);
        Seminar::create([
            'uuid' => Str::orderedUuid(),
            'student_id' => $student->id,
        ]);
        Project::create([
            'uuid' => Str::orderedUuid(),
            'student_id' => $student->id,
        ]);
        return redirect("login")->withSuccess('Great! You have Successfully registered');
    }

    public function login()
    {
        return view('login');
    }

    public function authLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('student/dashboard')->withSuccess('You have Successfully loggedin');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.',])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
