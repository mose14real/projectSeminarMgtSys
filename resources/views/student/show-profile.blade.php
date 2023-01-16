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
    <title>Project & Seminar Archival Mgt Sys</title>
</head>

<body>

    <!-- NAVBAR SECTION STARTS HERE -->
    <nav class="navbar navbar-expand-lg" id="navigation-bar">
        <div class="container">
            <h1 class="navbar-brand font-bold text-white " href="{{ url('student/dashboard') }}"><i
                    class="bi bi-box-seam-fill">
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
                            href="{{ url('student/dashboard') }}">Home</a>
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
                        <i class="bi bi-person-circle"> {{ auth()->user()->email }}</i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('student/profile/edit/') }}"><i
                                    class="bi bi-person-badge-fill"></i>
                                Edit Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="{{ route('logout') }}"><button
                                    class="btn btn-block d-block mx-auto sign-out-btn">Sign
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
                                    Notification center</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <small> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad libero deserunt
                                        veniam quas tenetur aliquid aperiam animi sunt recusandae excepturi accusamus
                                        provident possimus accusantium optio eaque voluptatibus omnis voluptate, quam
                                        neque. Corrupti libero, odio explicabo expedita hic aperiam. Quaerat illum
                                        tempore id accusantium adipisci soluta cupiditate deleniti asperiores,
                                        necessitatibus unde eos, dolorum veritatis debitis tempora quia molestias?
                                        Alias, voluptatibus explicabo!</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </nav>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="user-details-section mb-5">
        <div class="container">
            <h2 class="mt-5">Personal Information</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <form class="mt-3" action="#" method="POST">
                        @csrf
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" placeholder="First Name" name="first_name"
                                value="">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" placeholder="Middle Name" name="middle_name"
                                value="">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                                value="">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" placeholder="Matric Number" name="matric"
                                value="">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                value="">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone"
                                value="">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" placeholder="Supervisor" name="supervisor"
                                value="">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" placeholder="Session i.e 2021/2022"
                                name="session" value="">
                        </div>
                        <div class="col-12 mb-3">
                            <a href="{{ url('student/profile/edit') }}"><button type="submit"
                                    class="btn btn-block w-25 register-page-btn">Edit Profile</button>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('img/5.svg') }}" alt="" style="width:300px;margin-left:50px;">
                </div>
            </div>
        </div>
    </div>

    <!-- PROJECT AND SEMINAR HERE -->
    <div class="" id="projects">
    </div>

    </div>
    </div>

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
                            <i class="bi bi-chevron-right text-white"></i> <a href="{{ url('student/dashboard') }}"
                                class="text-white quick-links">Home</a>
                        </li>
                        <li class="mt-2">
                            <i class="bi bi-chevron-right text-white"></i> <a href="#projects"
                                class="text-white quick-links">Projects</a>
                        </li>
                        <li class="mt-2">
                            <i class="bi bi-chevron-right text-white"></i> <a href="#projects"
                                class="text-white quick-links">Seminars</a>
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        const projectTypeUser = document.querySelector('.project-type-user');
        const groupDetailsUser = document.querySelector('.group-details-user');
        const projectTypeEditUser = document.querySelector('.project-type-edit-user');
        const groupDetailsEditUser = document.querySelector('.group-details-edit-user');
        projectTypeUser.addEventListener('click', (event) => {
            event.preventDefault();
            if (projectTypeUser.value == 'group') {
                groupDetailsUser.classList.remove('d-none');
            } else if (projectTypeUser.value == 'individual') {
                groupDetailsUser.classList.add('d-none');
            }
        })
        projectTypeEditUser.addEventListener('click', (event) => {
            // alert()
            event.preventDefault();
            if (projectTypeEditUser.value == 'group') {
                groupDetailsEditUser.classList.remove('d-none');
            } else if (projectTypeEditUser.value == 'individual') {
                groupDetailsEditUser.classList.add('d-none');
            }
        })
    </script>
</body>

</html>
