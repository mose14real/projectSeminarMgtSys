<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Seminar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Support\Str;

class StudentController extends Controller
{

    public function dashboard()
    {
        if (Auth::check()) {
            return view('student.dashboard');
        }

        return redirect('login')->withSuccess('Opps! You do not have access to dashboard');
    }

    public function showProfile($uuid)
    {
        if (Auth::check()) {
            $student = Student::findByUuid($uuid);
            return view('student.show-profile', compact('student'));
        }
        return redirect('login')->withSuccess('Opps! You do not have access to show profile');
    }

    public function editProfile($uuid)
    {
        if (Auth::check()) {
            $student = Student::findByUuid($uuid);
            return view('student.edit-profile', compact('student'));
        }
        return redirect('login')->withSuccess('Opps! You do not have access to edit profile');
    }

    public function updateProfile(Request $request, $uuid)
    {
        $credentials = $request->validate([
            'first_name' => [],
            'middle_name' => [],
            'last_name' => [],
            'matric' => [],
            'email' => [],
            'phone' => ['min:11'],
            'supervisor' => [],
            'session' => ['min:9', 'max:9'],
        ]);

        if (Auth::check()) {
            $student = Student::findByUuid($uuid);
            $student->update($credentials);
            $student->user->update($credentials);

            return redirect('student/profile/show/' . $uuid)->withSuccess('Profile updated successfully');
        }

        return redirect("login")->withSuccess('Opps! You do not have access to update profile');
    }

    public function createSeminar(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'seminar_topic' => ['required'],
                'seminar_desc' => ['required'],
            ]);
            $seminar = Seminar::create([
                'uuid' => Str::orderedUuid(),
                'seminar_topic' => $request['seminar_topic'],
                'seminar_desc' => $request['seminar_desc'],
            ]);
            // dd($seminar);
            return redirect('student/dashboard')->withSuccess('Great! You have Successfully registered');
        }
    }

    public function uploadSeminar(Request $request, $uuid)
    {
        //
    }

    public function downloadSeminar(Request $request, $uuid)
    {
        //
    }

    public function seminarDetails($uuid)
    {
        if (Auth::check()) {
            $seminar = Seminar::findByUuid($uuid);
            return view('student.seminar-details', compact('seminar'));
        }
        return redirect('login')->withSuccess('Opps! No access to view seminar details');
    }

    // public function createProject()
    // {
    //     //
    // }

    // public function uploadProject(Request $request, $uuid)
    // {
    //     //
    // }

    // public function downloadProject(Request $request, $uuid)
    // {
    //     //
    // }

    public function projectDetails($uuid)
    {
        if (Auth::check()) {
            $project = Seminar::findByUuid($uuid);
            return view('student.project-details', compact('project'));
        }
        return redirect('login')->withSuccess('Opps! No access to view project details');
    }
}
