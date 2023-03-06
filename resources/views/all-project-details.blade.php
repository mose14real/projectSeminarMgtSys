<!DOCTYPE html>
<html lang="en">

<x-head-tag-link title="Project-Details | Page" />

<body>

    <!-- NAVBAR SECTION STARTS HERE -->
    <x-nav-bar-index />

    <!-- PROJECT DETAILS START HERE -->
    <div class="project-details-section bg-white" id="projects">
        <div class="container">
            <h3 class="text-center mt-5 deep-blue-color">Project Details</h2>
                <h2 class="text-center fw-light mt-5">{{ $project->project_topic }}</h2>
                <p class="text-center">{{ $project->project_desc }}</p>
                <div class="mt-5 col-md-4 student-details-card">
                    <div class="row">
                        <div class="col p-3">
                            <img src="{{ asset('img/4.svg') }}" alt="">
                        </div>
                        <div class="col p-3">
                            <h3 class="fw-normal fs-5">
                                {{ $developer->first_name . ' ' . $developer->middle_name . ' ' . $developer->last_name }}
                            </h3>
                            <h2 class="fw-normal fs-5"><i>{{ $developer->student->matric }}</i></h2>
                            <span class="me-3 fs-6 timestamp">Published on <br><i class="bi bi-clock-fill fs-6"></i>
                                {{ $project->updated_at }}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">Project Topic</th>
                                <td>{{ $project->project_topic }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Project Description</th>
                                <td>{{ $project->project_desc }}</td>
                            </tr>
                            <tr>
                                <th scope="row">File</th>
                                <td>
                                    {{ $project->project_file_name }}
                                    <a href="{{ url('download/' . base64_encode($project->project_file_path)) }}"
                                        download><button type="button" class="btn btn-block edit-btn float-end"
                                            hidden>Download</button>
                                        <div class="clearfix"></div>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
        <!-- ENDS HERE -->

        <!-- FOOTER SECTION -->
        <x-footer-index />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
