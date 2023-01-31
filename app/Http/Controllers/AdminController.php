<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Seminar;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    #--Admin--Show--Profile--
    public function showProfile($uuid)
    {
        $admin = User::findByUuid($uuid);
        return view('admin.show-profile', compact('admin'));
    }

    #--Admin--Edit--Profile--
    public function editProfile($uuid)
    {
        $admin = User::findByUuid($uuid);
        return view('admin.edit-profile', compact('admin'));
    }

    #--Admin--Update--Profile--
    public function updateProfile(Request $request, $uuid)
    {
        $credentials = $request->validate(
            [
                'first_name' => ['required'],
                'middle_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required', 'unique:users']
            ]
        );
        $admin = User::findByUuid($uuid);
        $admin->update($credentials);
        return redirect('admin/profile/show/' . $uuid)->withSuccess('Profile updated successfully');
    }

    #--View--Student--
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

    #--Edit--Student--Profile--
    public function editStudentProfile($uuid)
    {
        $user = User::findByUuid($uuid);
        return $user->load('student');
    }

    #--Update--Student--Profile--
    public function updateStudentProfile(Request $request, $uuid)
    {
        $credentials = $request->validate(
            [
                'first_name' => ['required'],
                'middle_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required'],
                'matric' => ['required', 'min:10', 'max:10'],
                'phone' => ['required', 'min:11', 'max:11'],
                'supervisor' => ['required'],
                'session' => ['required']
            ]
        );
        $student = Student::findByUuid($uuid);
        $student->update($credentials);
        $student->user->update($credentials);
        return redirect('admin/student-data')->withSuccess('Student profile updated successfully');
    }

    #--View--Project--
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

    #--Edit--Student--Project--
    public function editStudentProject($uuid)
    {
        $project = Project::findByUuid($uuid);
        // Log::info($project);
        return $project;
    }

    #--Update--Student--Project--
    public function updateStudentProject(Request $request, $uuid)
    {
        $credentials = $request->validate(
            [
                'project_topic' => ['required'],
                'project_desc' => ['required'],
                'project_type' => ['required'],
                'project_members' => ['required_if:project_type,group'],
                'project_file_name' => [],
                'project_file_path' => []
            ]
        );
        $project = Project::findByUuid($uuid);
        $project->update($credentials);
        return redirect('admin/project-data')->withSuccess('Student project updated successfully');
    }

    #--View--Seminar--
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

    #--Edit--Student--Seminar--
    public function editStudentSeminar($uuid)
    {
        $seminar = Seminar::findByUuid($uuid);
        return $seminar;
    }

    #--Update--Student--Seminar--
    public function updateStudentSeminar(Request $request, $uuid)
    {
        $credentials = $request->validate(
            [
                'seminar_topic' => ['required'],
                'seminar_desc' => ['required'],
                'seminar_file_name' => [],
                'seminar_file_path' => []
            ]
        );
        $seminar = Seminar::findByUuid($uuid);
        $seminar->update($credentials);
        return redirect('admin/seminar-data')->withSuccess('Student seminar updated successfully');
    }
}
