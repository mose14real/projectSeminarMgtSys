<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Student;
use App\Models\User;
use Hash;

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

    public function uploadProject(Request $request, $uuid)
    {
        //
    }

    public function downloadProject(Request $request, $uuid)
    {
        //
    }

    public function uploadSeminar(Request $request, $uuid)
    {
        //
    }

    public function downloadSeminar(Request $request, $uuid)
    {
        //
    }

    public function logout(Request $request)
    {
        // Session::flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
