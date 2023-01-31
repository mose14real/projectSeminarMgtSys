<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Seminar;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    #--View--Index--
    public function index()
    {
        $seminars = Seminar::whereNotNull('seminar_topic')->orderBy('id', 'desc')->paginate(3);
        $projects = Project::whereNotNull('project_topic')->orderBy('id', 'desc')->paginate(3);
        return view(
            'index',
            [
                "seminars" => $seminars,
                "projects" => $projects
            ]
        );
    }

    #--View--All--Project--Details--
    public function projectDetailsAll($uuid)
    {
        $project = Project::findByUuid($uuid);
        $developer = $project->student->user;
        return view(
            'all-project-details',
            [
                "project" => $project,
                "developer" => $developer
            ]
        );
    }

    #--View--All--Seminar--Details--
    public function seminarDetailsAll($uuid)
    {
        $seminar = Seminar::findByUuid($uuid);
        $developer = $seminar->student->user;
        return view(
            'all-seminar-details',
            [
                "seminar" => $seminar,
                "developer" => $developer
            ]
        );
    }

    #--Download--ProSem--
    public function downloadProSem($file)
    {
        $file = base64_decode($file);
        return response()->download(public_path($file));
    }

    #--View--Register--Page--
    public function register()
    {
        return view('register');
    }

    #--Create--User--Student--Seminar--Project
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'last_name' => ['required'],
            'matric' => ['required', 'unique:students', 'min:10', 'max:10'],
            'email' => ['required', 'unique:users'],
            'phone' => ['required', 'unique:students', 'min:11', 'max:11'],
            'supervisor' => ['required'],
            'session' => ['required', 'min:9', 'max:9'],
            'password' => ['required'],
            'cpassword' => ['required', 'same:password'],
        ]);
        #--Database--Transaction--
        DB::transaction(function () use ($request) {
            #--Create--User--
            $user = User::create([
                'uuid' => Str::orderedUuid(),
                'first_name' => $request['first_name'],
                'middle_name' => $request['middle_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'role' => 'student',
                'password' =>  Hash::make($request['password'])
            ]);
            #--Create--Student--
            $student = Student::create([
                'uuid' => Str::orderedUuid(),
                'user_id' => $user->id,
                'matric' => $request['matric'],
                'phone' => $request['phone'],
                'supervisor' => $request['supervisor'],
                'session' => $request['session'],
            ]);
            #--Create--Seminar--
            Seminar::create([
                'uuid' => Str::orderedUuid(),
                'student_id' => $student->id,
            ]);
            #--Create--Project--
            Project::create([
                'uuid' => Str::orderedUuid(),
                'student_id' => $student->id,
            ]);
        }, 2);
        return redirect('login')->withSuccess('Great! You have Successfully registered');
    }

    #--View--Login--Page--
    public function login()
    {
        return view('login');
    }

    #--Authorize--Login--
    public function authLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            if (auth()->user()->role == "admin") {
                return redirect()->intended('admin/dashboard')->withSuccess('You have Successfully loggedin');
            }
            return redirect()->intended('student/dashboard')->withSuccess('You have Successfully loggedin');
        }
        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    #--Logout--
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
