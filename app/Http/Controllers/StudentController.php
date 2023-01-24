<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Seminar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\User;
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

    public function createSeminar(Request $request, $uuid)
    {
        $credentials = $request->validate([
            'seminar_topic' => ['required'],
            'seminar_desc' => ['required'],
        ]);

        if (Auth::check()) {
            $seminar = Seminar::findByUuid($uuid);
            $seminar->update($credentials);
            return redirect('student/dashboard')->withSuccess('Seminar registered successfully');
        }
        return redirect("login")->withSuccess('Opps! You do not have access to register seminar');
    }

    public function uploadSeminar(Request $request, $uuid)
    {
        $request->validate([
            'seminar_file' => ['required', 'mimes:doc,docx,pdf,zip', 'max:2048']
        ]);

        if (Auth::check()) {
            $seminar = Seminar::findByUuid($uuid);
            if ($request->seminar_file) {
                $fileName = $request->seminar_file->getClientOriginalName();
                $filePath = $request->seminar_file->move(public_path('seminars'), $fileName);
                $seminarPath = "seminars/{$fileName}";
                $seminar->seminar_file_path = $seminarPath;
                $seminar->save();
                return redirect('student/dashboard')->withSuccess('Seminar uploaded successfully');
            }
        }
        return redirect("login")->withSuccess('Opps! Access denied to upload seminar');
    }

    public function downloadSeminar(Request $request, $uuid)
    {
        $seminars = Seminar::orderBy('id', 'desc')->paginate(5);
        return view('fileDownload', compact('seminars'));
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
