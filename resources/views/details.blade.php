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
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <h1 class="navbar-brand font-bold text-white" href="#"><i class="bi bi-box-seam-fill"></i> ProjectArch
            </h1>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <li class="bi bi-list fs-1 text-white"></li>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="#seminars">Seminars</a>
                    </li>
                </ul>
                <!-- register and login button wrapper -->
                <div>
                    <a href="#" class="">
                        <button class="btn btn-block shadow-none register-btn">Register</button>
                    </a>
                    <a href="#" class="ms-3 mt-2">
                        <button class="btn btn-block shadow-none login-btn">Login</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- HEADER SECTION STARTS HERE -->
    <header class="header-section d-flex align-items-center justify-content-center flex-column">
        <div class="container">
            <h1 class="text-center header-text">Project and Seminar Management System <i
                    class="fas fa-book-open-cover"></i></h1>
            <p class="mt-3 text-center text-white">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ducimus recusandae voluptatem,
                commodi odio optio rem, aperiam odit veniam saepe amet quam atque expedita officia nihil reiciendis?
                Provident cumque molestiae libero minima quasi corporis tempora error necessitatibus officiis, doloribus
                deleniti ipsum mollitia cum ex blanditiis illum architecto sequi aut impedit, voluptate atque alias
                magnam expedita ab? Eligendi facere et autem, sunt possimus minus ex, iure tempore nam fuga harum ut
                officiis cupiditate vel cum
            </p>
            <div class="mx-auto mt-3 col-8">
                <form>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <input type="search" class="form-control p-2" placeholder="Search Projects / Seminars"
                                aria-label="First name">
                        </div>
                        <div class="col-md-4 mb-3">
                            <button type="submit" class="btn btn-block p-2 w-100 search-btn">Search</button>
                        </div>
                    </div>
                </form>
            </div>


            <img src="{{ asset('img/data-archival.svg') }}" alt=""
                class="data-archival-img d-none d-sm-none d-md-block">
            <img src="{{ asset('img/data-archival.svg') }}" alt=""
                class="data-archival-img2 d-none d-sm-none d-md-block">
        </div>
    </header>

    <!-- PROJECT AND SEMINAR HERE -->
    <div class="project-details-section bg-white" id="projects">
        <!-- starts -->
        <div class="container">
            <h2 class="text-center mt-5 deep-blue-color">Projects Downloads</h2>
            <h2 class="fw-light mt-5">Free Download Online Air Conditioner Shop Project in PHP with source code</h2>
            <div class="mt-3">
                <span class="badge bg-primary text-white fs-6 fw-normal">Projects</span>
                <span class="me-3 fs-6">Published on -</span><span class="timestamp fs-6"><i
                        class="bi bi-clock-fill fs-6"></i> 2022-09-14</span>
            </div>
            <!-- student details card starts here -->
            <div class="mt-5 col-md-4 student-details-card">
                <div class="row">
                    <div class="col p-3">
                        <img src="{{ asset('img/4.svg') }}" alt="">
                    </div>
                    <div class="col p-3">
                        <h3 class="fw-normal fs-5">
                            <a href="#">Ariyibi Baseet</a>
                        </h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur
                        </p>
                        <div class="mt-2">
                            <a href="fs-5"><i class="bi bi-facebook fs-4"></i></a>
                            <a href="fs-5"><i class="bi bi-twitter fs-4 ms-2"></i></a>
                            <a href="fs-5"><i class="bi bi-linkedin fs-4 ms-2"></i></a>
                            <a href="fs-5"><i class="bi bi-instagram fs-4 ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ends here -->

            <h2 class="fw-normal mt-5">Project Details..</h2>
            <span class="badge bg-primary text-white fs-6 fw-normal">Project information</span>
            <div class="mt-5">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Project Name</th>
                            <td>Online Air Conditioner Shop</td>
                        </tr>
                        <tr>
                            <th scope="row">Project ID</th>
                            <td>9126</td>
                        </tr>
                        <tr>
                            <th scope="row">Developer Name</th>
                            <td>Ariyibi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- cont ends -->
        <!-- ends -->
    </div>

    <!-- PROJECTS -->
    <div class="projects">
        <div class="container">
            <h2 class="text-center mb-3 mt-5 deep-blue-color">Projects And Seminars Lists</h2>
            <div class="row">
                <!-- project card starts here -->
                <div class="col-md-4 mb-3">
                    <div class="card project-main-card">
                        <div class="card-body">
                            <span class="badge text-bg-primary mb-2 font-poppins">project <i
                                    class="bi bi-book-fill"></i></span>
                            <h5 class="card-title">
                                <a href="#">Control Management system in Javascript</a>
                            </h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis optio ipsam obcaecati
                                doloribus officiis, nesciunt eum laborum nostrum error consectetur?
                            </p>
                            <div class="row mb-3">
                                <div class="col">
                                    <a href="#">
                                        <i class="bi bi-person-circle fs-6"></i> <span
                                            class="ml-2 fs-6">Ariyibi</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <i class="bi bi-alarm-fill fs-6"></i> <span class="ml-2 fs-6">2022-09-05</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ends here -->

                <!-- project card starts here -->
                <div class="col-md-4 mb-3">
                    <div class="card project-main-card">
                        <div class="card-body">
                            <span class="badge text-bg-primary mb-2 font-poppins">seminar <i
                                    class="bi bi-book-fill"></i></span>
                            <h5 class="card-title">
                                <a href="#">Simple Furniture Website Single Page Template in HTML and CSS</a>
                            </h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis optio ipsam obcaecati
                                doloribus officiis, nesciunt eum laborum nostrum error consectetur?
                            </p>
                            <div class="row mb-3">
                                <div class="col">
                                    <a href="#">
                                        <i class="bi bi-person-circle fs-6"></i> <span
                                            class="ml-2 fs-6">Ariyibi</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <i class="bi bi-alarm-fill fs-6"></i> <span class="ml-2 fs-6">2022-09-05</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ends here -->

                <!-- project card starts here -->
                <div class="col-md-4 mb-3">
                    <div class="card project-main-card">
                        <div class="card-body">
                            <span class="badge text-bg-primary mb-2 font-poppins">project <i
                                    class="bi bi-book-fill"></i></span>
                            <h5 class="card-title">
                                <a href="#">Android Firebase Attendance System template in kotlin</a>
                            </h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis optio ipsam obcaecati
                                doloribus officiis, nesciunt eum laborum nostrum error consectetur?
                            </p>
                            <div class="row mb-3">
                                <div class="col">
                                    <a href="#">
                                        <i class="bi bi-person-circle fs-6"></i> <span
                                            class="ml-2 fs-6">Ariyibi</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <i class="bi bi-alarm-fill fs-6"></i> <span class="ml-2 fs-6">2022-09-05</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ends here -->

                <!-- project card starts here -->
                <div class="col-md-4 mb-3">
                    <div class="card project-main-card">
                        <div class="card-body">
                            <span class="badge text-bg-primary mb-2 font-poppins">seminar <i
                                    class="bi bi-book-fill"></i></span>
                            <h5 class="card-title">
                                <a href="#">Online Shopping Store project in PHP</a>
                            </h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis optio ipsam obcaecati
                                doloribus officiis, nesciunt eum laborum nostrum error consectetur?
                            </p>
                            <div class="row mb-3">
                                <div class="col">
                                    <a href="#">
                                        <i class="bi bi-person-circle fs-6"></i> <span
                                            class="ml-2 fs-6">Ariyibi</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <i class="bi bi-alarm-fill fs-6"></i> <span class="ml-2 fs-6">2022-09-05</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ends here -->
            </div>
        </div>
    </div>

    <!-- FOOTER SECTION -->
    <footer class="mt-5">
        <div class="container">
            <div class="row">

                <!-- ProjectArch -->
                <div class="col-md-6 p-3 mb-3">
                    <a href="#">
                        <h4 class="text-white mt-3"><i class="bi bi-box-seam-fill"></i> ProjectArch</h4>
                    </a>
                    <p class="text-white mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui atque et, ipsum laboriosam,
                        voluptatibus consequatur distinctio suscipit recusandae cupiditate quam voluptatem eius animi
                    </p>
                </div>

                <!-- quick links -->
                <div class="col-md-3 p-3 mb-3">
                    <h5 class="text-white mt-3">Quick Links</h5>
                    <ul>
                        <li class="mt-3">
                            <i class="bi bi-chevron-right text-white"></i> <a href="#"
                                class="text-white quick-links">Home</a>
                        </li>
                        <li class="mt-2">
                            <i class="bi bi-chevron-right text-white"></i> <a href="#"
                                class="text-white quick-links">Projects</a>
                        </li>
                        <li class="mt-2">
                            <i class="bi bi-chevron-right text-white"></i> <a href="#"
                                class="text-white quick-links">Seminars</a>
                        </li>
                        <li class="mt-2">
                            <i class="bi bi-chevron-right text-white"></i> <a href="#"
                                class="text-white quick-links">Register</a>
                        </li>
                        <li class="mt-2">
                            <i class="bi bi-chevron-right text-white"></i> <a href="#"
                                class="text-white quick-links">Login</a>
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
                &copy; CopyRight Reserved 2022</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
