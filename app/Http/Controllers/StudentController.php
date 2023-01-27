<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Seminar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class StudentController extends Controller
{
    #--STUDENT--START--HERE--

    #--Student--Dashboard--
    public function dashboard()
    {
        $seminar = Auth::user()->student->seminar;
        $project = Auth::user()->student->project;
        return view(
            'student.dashboard',
            [
                "count_seminar_topic" => is_null($seminar->seminar_topic) ? "0" : "1",
                "count_seminar_file" => is_null($seminar->seminar_file_name) ? "0" : "1",
                "count_project_topic" => is_null($project->project_topic) ? "0" : "1",
                "count_project_file" => is_null($project->project_file_name) ? "0" : "1"
            ]
        );
    }

    #--Student--Show--Profile--
    public function showProfile($uuid)
    {
        $student = Student::findByUuid($uuid);
        return view('student.show-profile', compact('student'));
    }

    #--Student--Edit--Profile--
    public function editProfile($uuid)
    {
        $student = Student::findByUuid($uuid);
        return view('student.edit-profile', compact('student'));
    }

    #--Student--Update--Profile--
    public function updateProfile(Request $request, $uuid)
    {
        $credentials = $request->validate(
            [
                'phone' => ['min:11', 'max:11']
            ]
        );
        $student = Student::findByUuid($uuid);
        $student->update($credentials);
        $student->user->update($credentials);
        return redirect('student/profile/show/' . $uuid)->withSuccess('Profile updated successfully');
    }

    #--Student--Download--All--
    public function downloadAll($file)
    {
        $file = base64_decode($file);
        return response()->download(public_path($file));
    }
    #--ENDS--HERE--


    #--SEMINAR--START--HERE--

    #--Create--Seminar--
    public function createSeminar(Request $request, $uuid)
    {
        $credentials = $request->validate(
            [
                'seminar_topic' => ['required'],
                'seminar_desc' => ['required'],
            ]
        );
        $seminar = Seminar::findByUuid($uuid);
        if (!is_null($seminar->seminar_topic)) {
            return redirect('student/dashboard')->withSuccess('Seminar already exist');
        }
        $seminar->update($credentials);
        return redirect('student/dashboard')->withSuccess('Seminar registered successfully');
    }

    #--Upload--Seminar--
    public function uploadSeminar(Request $request, $uuid)
    {
        $request->validate(
            [
                'seminar_file' => ['required', 'mimes:doc,docx,pdf,zip', 'max:2048']
            ]
        );
        $seminar = Seminar::findByUuid($uuid);
        if (is_null($seminar->seminar_topic)) {
            return redirect('student/dashboard')->withSuccess("Register seminar before uploading it's file");
        }
        if (!is_null($seminar->seminar_file_name)) {
            return redirect('student/dashboard')->withSuccess('Seminar file already exist');
        }
        if ($request->seminar_file) {
            $seminarName = time() . "_" . $request->seminar_file->getClientOriginalName();
            $publicPath = $request->seminar_file->move(public_path('seminars'), $seminarName);
            $seminarPath = "seminars/{$seminarName}";
            $seminar->seminar_file_name = $seminarName;
            $seminar->seminar_file_path = $seminarPath;
            $seminar->save();
            return redirect('student/dashboard')->withSuccess('Seminar file uploaded successfully');
        }
    }

    #--Seminar--Details--
    public function seminarDetails($uuid)
    {
        $seminar = Seminar::findByUuid($uuid);
        $developer = $seminar->student->user;
        return view('student.seminar-details', [
            "seminar" => $seminar,
            "developer" => $developer
        ]);
    }
    #--ENDS--HERE--


    #--PROJECT--START--HERE--

    #--Create--Project--
    public function createProject(Request $request, $uuid)
    {
        $credentials = $request->validate([
            'project_topic' => ['required'],
            'project_desc' => ['required'],
            'project_type' => ['required'],
            'project_members' => ['required_if:project_type,group'],
        ]);
        $project = Project::findByUuid($uuid);
        if (!is_null($project->project_topic)) {
            return redirect('student/dashboard')->withSuccess('Project already exist');
        }
        $project->update($credentials);
        return redirect('student/dashboard')->withSuccess('Project registered successfully');
    }

    #--Upload--Project--
    public function uploadProject(Request $request, $uuid)
    {
        $request->validate(
            [
                'project_file' => ['required', 'mimes:doc,docx,pdf,zip,rar', 'max:8000000']
            ]
        );
        $project = Project::findByUuid($uuid);
        if (is_null($project->project_topic)) {
            return redirect('student/dashboard')->withSuccess("Register project before uploading it's file");
        }
        if (!is_null($project->project_file_name)) {
            return redirect('student/dashboard')->withSuccess('Project file already exist');
        }
        if ($request->project_file) {
            $projectName = time() . "_" . $request->project_file->getClientOriginalName();
            $publicPath = $request->project_file->move(public_path('projects'), $projectName);
            $projectPath = "projects/{$projectName}";
            $project->project_file_name = $projectName;
            $project->project_file_path = $projectPath;
            $project->save();
            return redirect('student/dashboard')->withSuccess('Project file uploaded successfully');
        }
    }

    #--Project--Details--
    public function projectDetails($uuid)
    {
        $project = Project::findByUuid($uuid);
        $developer = $project->student->user;
        return view(
            'student.project-details',
            [
                "project" => $project,
                "developer" => $developer
            ]
        );
    }
    #--ENDS--HERE--
}
