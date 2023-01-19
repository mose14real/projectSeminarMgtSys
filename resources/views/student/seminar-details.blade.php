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
    <title>Project Details | Project & Seminar Archival Mgt Sys</title>
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
                            href="{{ url('student/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item d-flex">
                        <input type="search" class="form-control shadow-none" placeholder="Search Projects/Seminars">
                        <button type="submit" class="btn btn-block ms-2 search-btn"><i
                                class="bi bi-search"></i></button>
                    </li>
                </ul>

                <li class="nav-item dropdown me-5">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"> {{ auth()->user()->student->matric }}</i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                                href="{{ url('/student/profile/edit') }}/{{ auth()->user()->student->uuid }}"><i
                                    class="bi bi-person-badge-fill"></i>
                                Edit Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="{{ route('logout') }}"><button
                                    class="btn btn-block d-block mx-auto sign-out-btn">Log
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

    <!-- SEMINAR DETAILS START -->
    <div class="project-details-section bg-white" id="projects">
        <div class="container">
            <h2 class="text-center mt-5 deep-blue-color">Seminar Details</h2>
            <div class="mt-5 col-md-4 student-details-card">
                <div class="row">
                    <div class="col p-3">
                        <img src="{{ asset('img/4.svg') }}" alt="">
                    </div>
                    <div class="col p-3">
                        <h3 class="fw-normal fs-5">Student Name</h3>
                        <span class="me-3 fs-6 timestamp">Published on <br><i class="bi bi-clock-fill fs-6"></i>
                            2023-01-31</span>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Seminar Topic</th>
                            <td>Topic</td>
                        </tr>
                        <tr>
                            <th scope="row">Seminar Description</th>
                            <td>Description</td>
                        </tr>
                        <tr>
                            <th scope="row">File</th>
                            <td>Seminar File</td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-12 mb-3">
                    <a href="#"><button type="submit" class="btn btn-block edit-btn">Download</button>
                        <div class="clearfix"></div>
                    </a>
                </div>
            </div>

        </div>
        <!-- SEMINAR DETAILS END -->



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
                                <i class="bi bi-chevron-right text-white"></i> <a
                                    href="{{ url('student/dashboard') }}" class="text-white quick-links">Dashboard</a>
                            </li>
                            <li class="mt-2">
                                <i class="bi bi-chevron-right text-white"></i> <a href="{{ route('logout') }}"
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
