<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Seminar;
use App\Models\Student;
use App\Models\User;
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
        $students = Student::orderBy('id', 'desc')->paginate(5);
        return view(
            'admin.student-data',
            [
                "students" => $students
            ]
        );
    }

    public function projectData()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(5);
        return view(
            'admin.project-data',
            [
                "projects" => $projects
            ]
        );
    }

    public function seminarData()
    {
        $seminars = Seminar::orderBy('id', 'desc')->paginate(5);
        return view(
            'admin.seminar-data',
            [
                "seminars" => $seminars
            ]
        );
    }
}
