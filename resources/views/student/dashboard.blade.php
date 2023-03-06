<x-head-tag-link title="Student | Dashboard" />

<!-- NAVBAR SECTION STARTS HERE -->
<x-nav-bar-student />

<!-- PROJECT AND SEMINAR HERE -->
<div class="project-overview" id="projects-overview">
    <div class="container">
        <h2 class="text-center mt-5">Project And Seminar Overview</h2>
        <div class="row mt-5">
            <div class="col-md-4 mb-3">
                <div class="card project-overview-card">
                    <div class="card-body">
                        <span class="badge project-overview-badge mb-2 font-poppins">Register Project</span>
                        <p class="card-text text-center text-white">
                            <i class="bi bi-journal-text project-overview-icon"></i>
                        </p>
                        <h1 class="card-title text-center text-white">{{ $count_project_topic }}</h1>
                        <button class="btn btn-block w-100 project-overview-btn font-bold" data-bs-toggle="modal"
                            data-bs-target="#project-registration-modal">Register New
                            Project</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card project-overview-card">
                    <div class="card-body">
                        <span class="badge project-overview-badge mb-2 font-poppins">Upload Project</span>
                        <p class="card-text text-center text-white">
                            <i class="bi bi-cloud-arrow-up project-overview-icon"></i>
                        </p>
                        <h1 class="card-title text-center text-white">{{ $count_project_file }}</h1>
                        <button class="btn btn-block w-100 project-overview-btn font-bold" data-bs-toggle="modal"
                            data-bs-target="#project-upload-modal">+ Upload New
                            Project</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card project-overview-card">
                    <div class="card-body">
                        <span class="badge project-overview-badge mb-2 font-poppins">View Project</span>
                        <p class="card-text text-center text-white">
                            <i class="bi bi-journal-text project-overview-icon"></i>
                        </p>
                        <h1 class="card-title text-center text-white">{{ $count_project_topic }}</h1>
                        <a href="{{ url('student/project-details') }}/{{ auth()->user()->student->project->uuid }}"><button
                                class="btn btn-block w-100 project-overview-btn font-bold">View
                                Project</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card project-overview-card">
                    <div class="card-body">
                        <span class="badge project-overview-badge mb-2 font-poppins">Register Seminar</span>
                        <p class="card-text text-center text-white">
                            <i class="bi bi-journal-text project-overview-icon"></i>
                        </p>
                        <h1 class="card-title text-center text-white">{{ $count_seminar_topic }}</h1>
                        <button class="btn btn-block w-100 project-overview-btn font-bold" data-bs-toggle="modal"
                            data-bs-target="#seminar-registration-modal">Register New
                            Seminar</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card project-overview-card">
                    <div class="card-body">
                        <span class="badge project-overview-badge mb-2 font-poppins">Upload Seminar</span>
                        <p class="card-text text-center text-white">
                            <i class="bi bi-cloud-arrow-up project-overview-icon"></i>
                        </p>
                        <h1 class="card-title text-center text-white">{{ $count_seminar_file }}</h1>
                        <button class="btn btn-block w-100 project-overview-btn font-bold" data-bs-toggle="modal"
                            data-bs-target="#seminar-upload-modal">+ Upload New
                            Seminar</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card project-overview-card">
                    <div class="card-body">
                        <span class="badge project-overview-badge mb-2 font-poppins">View Seminar</span>
                        <p class="card-text text-center text-white">
                            <i class="bi bi-journal-text project-overview-icon"></i>
                        </p>
                        <h1 class="card-title text-center text-white">{{ $count_seminar_topic }}</h1>
                        <a href="{{ url('student/seminar-details') }}/{{ auth()->user()->student->seminar->uuid }}"><button
                                class="btn btn-block w-100 project-overview-btn font-bold">View
                                Seminar</button></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- PROJECT REGISTRATION MODAL SECTION STARTS HERE -->
        <div class="modal fade" id="project-registration-modal" tabindex="-1" data-bs-backdrop="static"
            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Project Registration</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-3"
                            action="{{ url('student/create-project') }}/{{ auth()->user()->student->project->uuid }}"
                            method="POST">
                            @csrf
                            <div class="col-12 mb-3">
                                @if ($errors->has('project_topic'))
                                    <span class="text-danger">{{ $errors->first('project_topic') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="Project Topic"
                                    name="project_topic" value="{{ old('project_topic') }}">
                            </div>
                            <div class="mb-3">
                                @if ($errors->has('project_desc'))
                                    <span class="text-danger">{{ $errors->first('project_desc') }}</span>
                                @endif
                                <textarea class="form-control" id="" rows="3" placeholder="Project Description" name="project_desc"
                                    value="{{ old('project_desc') }}"></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                @if ($errors->has('project_type'))
                                    <span class="text-danger">{{ $errors->first('project_type') }}</span>
                                @endif
                                <select class="form-select form-select-md mb-3 project-type-user"
                                    aria-label=".form-select-lg example" name="project_type">
                                    <option>-- Select Project Type --</option>
                                    <option value="Individual">Individual</option>
                                    <option value="Group">Group</option>
                                </select>
                            </div>
                            <div class="mb-3 d-none group-details-user">
                                @if ($errors->has('project_members'))
                                    <span class="text-danger">{{ $errors->first('project_members') }}</span>
                                @endif
                                <textarea class="form-control" rows="3" placeholder="Add group members matric numbers..."
                                    name="project_members" value="{{ old('project_members') }}"></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <button type="submit"
                                    class="btn btn-block float-end register-page-btn">Register</button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ENDS HERE -->

        <!-- SEMINAR REGISTRATION MODAL SECTION STARTS HERE -->
        <div class="modal fade" id="seminar-registration-modal" tabindex="-1" data-bs-backdrop="static"
            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Seminar Registration</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-3"
                            action="{{ url('student/create-seminar') }}/{{ auth()->user()->student->seminar->uuid }}"
                            method="POST">
                            @csrf
                            <div class="col-12 mb-3">
                                @if ($errors->has('seminar_topic'))
                                    <span class="text-danger">{{ $errors->first('seminar_topic') }}</span>
                                @endif
                                <input type="text" class="form-control" placeholder="Seminar Topic"
                                    name="seminar_topic" value="{{ old('seminar_topic') }}">
                            </div>
                            <div class="mb-3 group-details">
                                @if ($errors->has('seminar_desc'))
                                    <span class="text-danger">{{ $errors->first('seminar_desc') }}</span>
                                @endif
                                <textarea class="form-control" rows="3" placeholder="Seminar Description" name="seminar_desc"
                                    value="{{ old('seminar_desc') }}"></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <button type="submit"
                                    class="btn btn-block float-end register-page-btn">Register</button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ENDS HERE -->

        <!-- PROJECT UPLOAD MODAL SECTION STARTS HERE -->
        <div class="modal fade" id="project-upload-modal" tabindex="-1" data-bs-backdrop="static"
            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Project Upload</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-3"
                            action="{{ url('student/upload/project') }}/{{ auth()->user()->student->project->uuid }}"
                            method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @if ($errors->has('project_file'))
                                <span class="text-danger">{{ $errors->first('project_file') }}</span>
                            @endif
                            <div class="col-12 mb-3">
                                <input type="file" name="project_file" class="form-control">
                            </div>
                            <div class="col-12 mb-3">
                                <button type="submit" class="btn btn-block float-end register-page-btn">Upload
                                    Project</button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ENDS HERE -->

        <!-- SEMINAR UPLOAD MODAL SECTION STARTS HERE -->
        <div class="modal fade" id="seminar-upload-modal" tabindex="-1" data-bs-backdrop="static"
            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Seminar Upload</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-3"
                            action="{{ url('student/upload/seminar') }}/{{ auth()->user()->student->seminar->uuid }}"
                            method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="col-12 mb-3">
                                @if ($errors->has('seminar_file'))
                                    <span class="text-danger">{{ $errors->first('seminar_file') }}</span>
                                @endif
                                <input type="file" name="seminar_file" class="form-control">
                            </div>
                            <div class="col-12 mb-3">
                                <button type="submit" class="btn btn-block float-end register-page-btn">Upload
                                    Seminar</button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ENDS HERE -->
    </div>
</div>
<!-- FOOTER SECTION -->
<x-footer-student />
