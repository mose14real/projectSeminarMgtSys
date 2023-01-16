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

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function showProfile()
    {
        if (Auth::check()) {

            // Student::where('user_id', $id);

            return view('student.show-profile');
        }
        return redirect("login")->withSuccess('Opps! You do not have access to show profile');
    }

    public function editProfile($id)
    {
        if (Auth::check()) {
            return view('student.edit-profile');
        }
        return redirect("login")->withSuccess('Opps! You do not have access to edit profile');
    }

    public function updateProfile(Request $request, $id)
    {
        $credentials = $request->validate([
            'first_name' => [],
            'middle_name' => [],
            'last_name' => [],
            'matric' => ['min:10', 'max:10'],
            'email' => [],
            'phone' => ['min:11'],
            'supervisor' => [],
            'session' => ['min:9', 'max:9'],
        ]);

        if (Auth::check()) {

            Student::where('user_id', $id)->update($credentials);

            return redirect('student/profile/show' . $id)->withSuccess('Profile updated successfully');
        }

        return redirect("login")->withSuccess('Opps! You do not have access to update profile');
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

    public function logout(Request $request)
    {
        // Session::flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
