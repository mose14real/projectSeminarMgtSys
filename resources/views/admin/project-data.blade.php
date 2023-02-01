<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- BOOTSTRAP CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <!-- BOOTSTRAP ICONS CDN -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css"
        integrity="sha512-5PV92qsds/16vyYIJo3T/As4m2d8b6oWYfoqV+vtizRB6KhF1F9kYzWzQmsO6T3z3QG2Xdhrx7FQ+5R1LiQdUA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FONTAWESOME LINK -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- FAVICON -->
    <link rel="icon" href="{{ asset('img/archival.svg') }}">
    <!-- GENERAL STYLESHEET -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- <link rel="stylesheet" href="{{ asset('css/omitter.min.css') }}"> -->
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">
    <title>Project | Data</title>
</head>

<body>
    <!-- NAVBAR SECTION STARTS HERE -->
    <nav class="navbar navbar-expand-lg" id="navigation-bar">
        <div class="container">
            <h1 class="navbar-brand font-bold text-white"><i class="bi bi-box-seam-fill">
                    ProjectArch</i></h1>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <li class="bi bi-list fs-1 text-white"></li>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white active me-2" aria-current="page"
                            href="{{ url('admin/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item d-flex">
                        <input type="search" class="form-control shadow-none" placeholder="Search Projects">
                        <button type="submit" class="btn btn-block ms-2 search-btn"><i
                                class="bi bi-search"></i></button>
                    </li>
                </ul>
                <li class="nav-item dropdown me-5">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle">&nbsp;{{ auth()->user()->email }}</i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person-badge-fill"></i>
                                Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="{{ url('logout') }}"><button class="btn btn-block d-block mx-auto sign-out-btn">Log
                                    Out</button></a></li>
                    </ul>
                </li>

                <!-- notification -->
                <li class="nav-item notification-wrapper">
                    <i class="bi bi-bell-fill position-relative fs-5 text-white notification-bell"
                        data-bs-toggle="modal" data-bs-target="#modalId">
                        <span
                            class="position-absolute start-100 translate-middle bg-danger rounded-circle notification">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    </i>
                </li>

                <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId"><i class="bi bi-bell-fill fs-5"></i>
                                    Notifications</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <small> Notifications! Ntoifications!! Notifications!!!</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </nav>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <span>{{ $message }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- PROJECT AND SEMINAR HERE -->
    <div class="project-overview" id="projects-overview">
        <div class="container">
            <h2 class="text-start mt-5">Projects Data</h2>
            <div class="row mt-5">
                <!-- projects data table -->
                <div class="table-container">
                    <table class="project-data-table" style="">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th style="width: 30%">Topic</th>
                                <th style="width: 50%">Description</th>
                                <th>Type</th>
                                <th>Members</th>
                                <th>File Name</th>
                                <th>File Path</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </thead>
                            @foreach ($projects as $key => $project)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $project->project_topic }}</td>
                                    <td>{{ $project->project_desc }}</td>
                                    <td>{{ $project->project_type }}</td>
                                    <td>{{ $project->project_members }}</td>
                                    <td>{{ $project->project_file_name }}</td>
                                    <td>{{ $project->project_file_path }}</td>
                                    <td class="d-flex" style="gap:.2rem">
                                        <a data-bs-toggle="modal" data-bs-target="#project-upload-modal"
                                            data-attr="{{ $project->uuid }}" title="upload" id="uploadModal">
                                            <button class="btn btn-secondary p-0 fs-6"
                                                style="padding:.1rem .5rem !important;">
                                                <i class="bi bi-upload"></i>
                                            </button>
                                        </a>
                                        <a
                                            href="{{ url('admin/download/' . base64_encode($project->project_file_path)) }}">
                                            <button class="btn btn-block edit-btn p-0 fs-6"
                                                style="padding:.1rem .5rem !important"><i
                                                    class="bi bi-download"></i></button>
                                        </a>
                                        <a data-bs-toggle="modal" data-bs-target="#project-registration-modal"
                                            data-attr="{{ url('admin/edit-project') }}/{{ $project->uuid }}"
                                            title="edit" id="editProjectModal">
                                            <button class="btn btn-primary p-0 fs-6"
                                                style="padding:.1rem .5rem !important">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
                <div class="d-flex justify-content-center">{{ $projects->links() }}</div>
            </div>
        </div>
    </div>
    <!-- ends here -->

    <!-- EDIT PROJECTS MODAL SECTION STARTS HERE -->
    <div class="modal fade" id="project-registration-modal" tabindex="-1" data-bs-backdrop="static"
        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Edit Project</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="mt-3" id="projectAction" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="col-12 mb-3">
                            @if ($errors->has('project_topic'))
                                <span class="text-danger">{{ $errors->first('project_topic') }}</span>
                            @endif
                            <input type="text" id="project_topic" class="form-control" name="project_topic">
                        </div>
                        <div class="mb-3">
                            @if ($errors->has('project_desc'))
                                <span class="text-danger">{{ $errors->first('project_desc') }}</span>
                            @endif
                            <textarea class="form-control" id="project_desc" rows="3" name="project_desc"></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            @if ($errors->has('project_type'))
                                <span class="text-danger">{{ $errors->first('project_type') }}</span>
                            @endif
                            <select id="project_type" class="form-select form-select-md mb-3 project-type-user"
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
                            <textarea id="project_members" class="form-control" rows="3" name="project_members"></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            @if ($errors->has('project_file_name'))
                                <span class="text-danger">{{ $errors->first('project_file_name') }}</span>
                            @endif
                            <input type="text" id="project_file_name" class="form-control"
                                name="project_file_name">
                        </div>
                        <div class="col-12 mb-3">
                            @if ($errors->has('project_file_path'))
                                <span class="text-danger">{{ $errors->first('project_file_path') }}</span>
                            @endif
                            <input type="text" id="project_file_path" class="form-control"
                                name="project_file_path">
                        </div>
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-block float-end register-page-btn">Update
                                Project</button>
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
                    <form class="mt-3" id="uploadAction" enctype="multipart/form-data" method="POST">
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

    <!-- FOOTER SECTION -->
    <footer class="mt-5">
        <div class="container">
            <div class="row">
                <!-- ProjectArch -->
                <div class="col-md-6 p-3 mb-3">
                    <a href="#navigation-bar">
                        <h4 class="text-white mt-3"><i class="bi bi-box-seam-fill"> ProjectArch</i></h4>
                    </a>
                    <p class="text-white mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui atque et, ipsum laboriosam,
                        voluptatibus consequatur distinctio suscipit recusandae cupiditate quam voluptatem eius
                        animi
                    </p>
                </div>

                <!-- quick links -->
                <div class="col-md-3 p-3 mb-3">
                    <h5 class="text-white mt-3">Quick Links</h5>
                    <ul>
                        <li class="mt-3">
                            <i class="bi bi-chevron-right text-white"></i> <a href="{{ url('admin/dashboard') }}"
                                class="text-white quick-links">Dashboard</a>
                        </li>
                        <li class="mt-2">
                            <i class="bi bi-chevron-right text-white"></i> <a href="{{ url('logout') }}"
                                class="text-white quick-links">Logout</a>
                        </li>
                    </ul>
                </div>

                <!-- social links -->
                <div class="col-md-3 p-3 mb-3">
                    <h5 class="text-white mt-3">Social Links</h5>

                    <a href="#" class="text-white social-links">
                        <i class="bi bi-facebook fs-4 mt-3"></i>
                    </a>

                    <a href="#" class="fs-4 ms-3 mt-3 text-white social-links">
                        <i class="bi bi-twitter"></i>
                    </a>

                    <a href="#" class="fs-4 ms-3 mt-3 text-white social-links">
                        <i class="bi bi-linkedin"></i>
                    </a>

                    <a href="#" class="fs-4 ms-3 mt-3 text-white social-links">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 p-2 footer-bottom">
            <p class="text-center text-white">Created with ❤ By <a href="#" class="dev-opt">Developer</a>
                &copy; CopyRight Reserved 2023</p>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        const projectTypeUser = document.querySelector('.project-type-user');
        const groupDetailsUser = document.querySelector('.group-details-user');
        const projectTypeEditUser = document.querySelector('.project-type-edit-user');
        const groupDetailsEditUser = document.querySelector('.group-details-edit-user');
        projectTypeUser.addEventListener('click', (event) => {
            event.preventDefault();
            if (projectTypeUser.value == 'Group') {
                groupDetailsUser.classList.remove('d-none');
            } else if (projectTypeUser.value == 'Individual') {
                groupDetailsUser.classList.add('d-none');
            }
        })
        projectTypeEditUser.addEventListener('click', (event) => {
            event.preventDefault();
            if (projectTypeEditUser.value == 'Group') {
                groupDetailsEditUser.classList.remove('d-none');
            } else if (projectTypeEditUser.value == 'Individual') {
                groupDetailsEditUser.classList.add('d-none');
            }
        })
    </script>
    <script>
        const project_topic = document.getElementById('project_topic')
        const project_desc = document.getElementById('project_desc')
        const project_type = document.getElementById('project_type')
        const project_members = document.getElementById('project_members')
        const project_file_name = document.getElementById('project_file_name')
        const project_file_path = document.getElementById('project_file_path')
        const projectAction = document.getElementById('projectAction')
        $(document).on('click', '#editProjectModal', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                success: function(result) {
                    const updateProject = "{{ url('admin/update-project') }}" + "/" + result.uuid
                    projectAction.action = updateProject

                    project_topic.value = result.project_topic
                    project_desc.value = result.project_desc
                    project_type.value = result.project_type
                    project_members.value = result.project_members
                    project_file_name.value = result.project_file_name
                    project_file_path.value = result.project_file_path
                    return
                }
            })
        });
    </script>
    <script>
        const uploadAction = document.getElementById('uploadAction')
        $(document).on('click', '#uploadModal', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            console.log(href);
            const uploadProject = "{{ url('admin/upload-project') }}" + "/" + href
            uploadAction.action = uploadProject
        });
    </script>
</body>

</html>
