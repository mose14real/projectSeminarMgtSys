<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Student;
use Hash;

class StudentController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function register()
    {
        return view('student.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'f_name' => ['required'],
            'm_name' => ['required'],
            'l_name' => ['required'],
            'matric' => ['required', 'unique:students', 'min:10', 'max:10'],
            'email' => ['required', 'unique:students'],
            'phone' => ['required', 'unique:students', 'min:11'],
            'supervisor' => ['required'],
            'session' => ['required', 'min:9', 'max:9'],
            'password' => ['required'],
            'cpassword' => ['required', 'same:password'],
        ]);

        Student::create([
            'f_name' => $request['f_name'],
            'm_name' => $request['m_name'],
            'l_name' => $request['l_name'],
            'matric' => $request['matric'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'supervisor' => $request['supervisor'],
            'session' => $request['session'],
            // 'password' => Hash::make($request['password']),
            'password' => $request['password']
        ]);

        return redirect("student.dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    public function login()
    {
        return view('student.login');
    }

    public function authLogin(Request $request)
    {
        $request->validate([
            'matric' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('matric', 'password');

        // if (Auth::attempt($credentials)) {

        //     return redirect()->intended('dashboard')
        //         ->withSuccess('You have Successfully loggedin');
        // }

        // return redirect("login")->withSuccess('Opps! You have entered invalid credentials');

        if ($credentials) {
            return redirect()->intended('student.dashboard')->withSuccess('You have Successfully loggedin');
        }
    }

    public function dashboard()
    {
        // if (Auth::check()) {

        //     return view('student.dashboard');
        // }

        // return redirect("login")->withSuccess('Opps! You do not have access');

        return view('student.dashboard');
    }

    public function profile()
    {
        return view('student.profile');
    }

    public function details()
    {
        return view('details');
    }

    public function editProfile($id)
    {
        //
    }

    public function updateProfile(Request $request, $id)
    {
        //
    }

    public function uploadProject(Request $request, $id)
    {
        //
    }

    public function downloadProject(Request $request, $id)
    {
        //
    }

    public function uploadSeminar()
    {
        //
    }

    public function downloadSeminar()
    {
        //
    }

    public function logout()
    {
        //
    }
}
