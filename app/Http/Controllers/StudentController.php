<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Student;
use Hash;

class StudentController extends Controller
{
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
