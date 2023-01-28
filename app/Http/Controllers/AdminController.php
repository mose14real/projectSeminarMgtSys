<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Seminar;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    #--Student--Dashboard--
    public function dashboard()
    {
        $students = Student::count();
        $seminars = Seminar::count();
        $projects = Project::count();
        return view(
            'admin.dashboard',
            [
                "students" => $students,
                "seminars" => $seminars,
                "projects" => $projects
            ]
        );
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function studentData()
    {
        return view('admin.student-data');
    }

    public function projectData()
    {
        return view('admin.project-data');
    }

    public function seminarData()
    {
        return view('admin.seminar-data');
    }
}
