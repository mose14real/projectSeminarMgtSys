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
        if (Auth::check()) {
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
        return redirect('login')->withSuccess('Opps! No access to dashboard');
    }

    #--Student--Show--Profile--
    public function showProfile($uuid)
    {
        if (Auth::check()) {
            $student = Student::findByUuid($uuid);
            return view('student.show-profile', compact('student'));
        }
        return redirect('login')->withSuccess('Opps! No access to view profile');
    }

    #--Student--Edit--Profile--
    public function editProfile($uuid)
    {
        if (Auth::check()) {
            $student = Student::findByUuid($uuid);
            return view('student.edit-profile', compact('student'));
        }
        return redirect('login')->withSuccess('Opps! No access to edit profile');
    }

    #--Student--Update--Profile--
    public function updateProfile(Request $request, $uuid)
    {
        $credentials = $request->validate(
            [
                'phone' => ['min:11', 'max:11']
            ]
        );

        if (Auth::check()) {
            $student = Student::findByUuid($uuid);
            $student->update($credentials);
            $student->user->update($credentials);
            return redirect('student/profile/show/' . $uuid)->withSuccess('Profile updated successfully');
        }
        return redirect('login')->withSuccess('Opps! No access to update profile');
    }

    #--Student--Download--All--
    public function downloadAll($file)
    {
        if (Auth::check()) {
            $file = base64_decode($file);
            return response()->download(public_path($file));
        }
        return redirect('login')->withSuccess('Opps! No ccess to download file');
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

        if (Auth::check()) {
            $seminar = Seminar::findByUuid($uuid);
            if (!is_null($seminar->seminar_topic)) {
                return redirect('student/dashboard')->withSuccess('Seminar already exist');
            }
            $seminar->update($credentials);
            return redirect('student/dashboard')->withSuccess('Seminar registered successfully');
        }
        return redirect('login')->withSuccess('Opps! No access to register seminar');
    }

    #--Upload--Seminar--
    public function uploadSeminar(Request $request, $uuid)
    {
        $request->validate(
            [
                'seminar_file' => ['required', 'mimes:doc,docx,pdf,zip', 'max:2048']
            ]
        );

        if (Auth::check()) {
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
        return redirect('login')->withSuccess('Opps! No ccess to upload seminar');
    }

    #--Seminar--Details--
    public function seminarDetails($uuid)
    {
        if (Auth::check()) {
            $seminar = Seminar::findByUuid($uuid);
            $developer = $seminar->student->user;
            return view('student.seminar-details', [
                "seminar" => $seminar,
                "developer" => $developer
            ]);
        }
        return redirect('login')->withSuccess('Opps! No access to view seminar details');
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

        if (Auth::check()) {
            $project = Project::findByUuid($uuid);
            if (!is_null($project->project_topic)) {
                return redirect('student/dashboard')->withSuccess('Project already exist');
            }
            $project->update($credentials);
            return redirect('student/dashboard')->withSuccess('Project registered successfully');
        }
        return redirect('login')->withSuccess('Opps! No access to register project');
    }

    #--Upload--Project--
    public function uploadProject(Request $request, $uuid)
    {
        $request->validate(
            [
                'project_file' => ['required', 'mimes:doc,docx,pdf,zip,rar', 'max:8000000']
            ]
        );

        if (Auth::check()) {
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
        return redirect('login')->withSuccess('Opps! No ccess to upload project');
    }

    #--Project--Details--
    public function projectDetails($uuid)
    {
        if (Auth::check()) {
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
        return redirect('login')->withSuccess('Opps! No access to view project details');
    }
    #--ENDS--HERE--
}
