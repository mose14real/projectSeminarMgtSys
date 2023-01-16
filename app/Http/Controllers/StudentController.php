<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Student;
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

    public function logout(Request $request)
    {
        // Session::flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
