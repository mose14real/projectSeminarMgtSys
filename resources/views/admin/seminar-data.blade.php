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
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">
    <title>Seminar | Data</title>
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
                        <input type="search" class="form-control shadow-none" placeholder="Search Seminars">
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
            <h2 class="text-start mt-5">Seminars Data</h2>
            <div class="row mt-5">
                <!-- seminar data table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Topic</th>
                            <th scope="col">Description</th>
                            <th scope="col">File Name</th>
                            <th scope="col">File Path</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seminars as $key => $seminar)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $seminar->seminar_topic }}</td>
                                <td>{{ $seminar->seminar_desc }}</td>
                                <td>{{ $seminar->seminar_file_name }}</td>
                                <td>{{ $seminar->seminar_file_path }}</td>
                                <td class="d-flex" style="gap:.2rem">
                                    <a data-bs-toggle="modal" data-bs-target="#seminar-upload-modal"
                                        data-attr="{{ $seminar->uuid }}" title="upload" id="uploadModal">
                                        <button class="btn btn-secondary p-0 fs-6"
                                            style="padding:.1rem .5rem !important;">
                                            <i class="bi bi-upload"></i>
                                        </button>
                                    </a>
                                    <a
                                        href="{{ url('admin/download/' . base64_encode($seminar->seminar_file_path)) }}">
                                        <button class="btn btn-block edit-btn p-0 fs-6"
                                            style="padding:.1rem .5rem !important;">
                                            <i class="bi bi-download"></i>
                                        </button>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#seminar-registration-modal"
                                        data-attr="{{ url('admin/edit-seminar', $seminar->uuid) }}"title="edit"
                                        id="editSeminarModal">
                                        <button class="btn btn-primary p-0 fs-6"
                                            style="padding:.1rem .5rem !important;">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">{{ $seminars->links() }}</div>
            </div>
        </div>
    </div>
    <!-- ends here -->


    <!-- EDIT SEMINAR MODAL SECTION STARTS HERE -->
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
                    <form class="mt-3" id="seminarAction" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="col-12 mb-3">
                            <input type="text" id="matric" class="form-control" readonly>
                        </div>
                        <div class="col-12 mb-3">
                            @if ($errors->has('seminar_topic'))
                                <span class="text-danger">{{ $errors->first('seminar_topic') }}</span>
                            @endif
                            <input type="text" id="seminar_topic" class="form-control" name="seminar_topic"
                                placeholder="Seminar Topic">
                        </div>
                        <div class="mb-3 group-details">
                            @if ($errors->has('seminar_desc'))
                                <span class="text-danger">{{ $errors->first('seminar_desc') }}</span>
                            @endif
                            <textarea id="seminar_desc" class="form-control" rows="3" name="seminar_desc"
                                placeholder="Seminar Description"></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            @if ($errors->has('seminar_file_name'))
                                <span class="text-danger">{{ $errors->first('seminar_file_name') }}</span>
                            @endif
                            <input type="text" id="seminar_file_name" class="form-control"
                                name="seminar_file_name" placeholder="Seminar File Name">
                        </div>
                        <div class="col-12 mb-3">
                            @if ($errors->has('seminar_file_path'))
                                <span class="text-danger">{{ $errors->first('seminar_file_path') }}</span>
                            @endif
                            <input type="text" id="seminar_file_path" class="form-control"
                                name="seminar_file_path" placeholder="Seminar File Path">
                        </div>
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-block float-end register-page-btn">Update
                                Seminar</button>
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
                    <form class="mt-3" id="uploadAction" method="POST" enctype="multipart/form-data">
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
        const matric = document.getElementById('matric')
        const seminar_topic = document.getElementById('seminar_topic')
        const seminar_desc = document.getElementById('seminar_desc')
        const seminar_file_name = document.getElementById('seminar_file_name')
        const seminar_file_path = document.getElementById('seminar_file_path')
        const seminarAction = document.getElementById('seminarAction')
        $(document).on('click', '#editSeminarModal', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                success: function(result) {
                    const updateSeminar = "{{ url('admin/update-seminar') }}" + "/" + result.uuid
                    seminarAction.action = updateSeminar

                    matric.value = result.student.matric
                    seminar_topic.value = result.seminar_topic
                    seminar_desc.value = result.seminar_desc
                    seminar_file_name.value = result.seminar_file_name
                    seminar_file_path.value = result.seminar_file_path
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
            const uploadSeminar = "{{ url('admin/upload-seminar') }}" + "/" + href
            uploadAction.action = uploadSeminar
        });
    </script>
</body>

</html>
