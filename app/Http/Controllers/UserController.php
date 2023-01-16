<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users'],
            'role' => ['required'],
            'password' => ['required'],
            'cpassword' => ['required', 'same:password'],
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            // 'password' => Hash::make($request['password']),
            'password' => $request['password']
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
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('student.dashboard')
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Opps! You have entered invalid credentials');

        if ($credentials) {
            return redirect()->intended('student.dashboard')->withSuccess('You have Successfully loggedin');
        }
    }

    public function dashboard()
    {
        if (Auth::check()) {

            return view('student.dashboard');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');

        return view('student.dashboard');
    }



    public function logout()
    {
        //
    }
}
