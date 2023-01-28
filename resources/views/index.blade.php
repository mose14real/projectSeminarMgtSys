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

    <link rel="stylesheet" href="{{ asset('css/omitter.min.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">
    <title>Home | Page</title>
</head>

<body>
    <!-- NAVBAR SECTION STARTS HERE -->
    <nav class="navbar navbar-expand-lg" id="navigation-bar">
        <div class="container">
            <h1 class="navbar-brand font-bold text-white"><i class="bi bi-box-seam-fill">
                    ProjectArch</i></h1>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="#projects">Seminars</a>
                    </li>
                </ul>
                <!-- register and login button wrapper -->
                <div>
                    <a href="{{ url('register') }}" class="">
                        <button class="btn btn-block shadow-none register-btn">Register</button>
                    </a>
                    <a href="{{ url('login') }}" class="ms-3 mt-2">
                        <button class="btn btn-block shadow-none login-btn">Login</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- HEADER SECTION STARTS HERE -->
    <header class="header-section d-flex align-items-center justify-content-center flex-column" id="header">
        <div class="container">
            <h1 class="text-center header-text"><i class="fas fa-book-open-cover">Project and Seminar Management
                    System</i></h1>
            <p class="mt-3 text-center text-white">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ducimus recusandae voluptatem,
                commodi odio optio rem, aperiam odit veniam saepe amet quam atque expedita officia nihil reiciendis?
                Provident cumque molestiae libero minima quasi corporis tempora error necessitatibus officiis, doloribus
                deleniti ipsum mollitia cum ex blanditiis illum architecto sequi aut impedit, voluptate atque alias
                magnam expedita ab? Eligendi facere et autem, sunt possimus minus ex, iure tempore nam fuga harum ut
                officiis cupiditate vel cum
            </p>
            <div class="mx-auto mt-3 col-8">
                <form action="#" method="#">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <input type="search" class="form-control p-2" placeholder="Search Projects / Seminars"
                                name="search">
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
    <div class="project-and-seminar-section bg-white" id="projects">
        <div class="container">
            <div class="row">
                <!-- Ilustrations -->
                <div class="col-md-4 p-2">
                    <img src="{{ asset('img/2.svg') }}" alt="" class="project-illustrations mt-5">
                </div>
                <!-- projects cards starts here -->
                <div class="col-md-4 p-2">
                    <div class="card mt-5">
                        <div class="card-header project-header">
                            <h4 class="text-white">Projects</h4>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($projects as $project)
                                <li class="list-group-item">
                                    <a
                                        href="{{ url('project-details/' . $project->uuid) }}">{{ $project->project_topic }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="d-flex justify-content-center mt-1">{{ $projects->links() }}</div>
                </div>
                <!-- Seminars cards starts here -->
                <div class="col-md-4 p-2">
                    <div class="card mt-5">
                        <div class="card-header seminar-header">
                            <h4 class="text-white">Seminars</h4>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($seminars as $seminar)
                                <li class="list-group-item">
                                    <a
                                        href="{{ url('seminar-details/' . $seminar->uuid) }}">{{ $seminar->seminar_topic }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="d-flex justify-content-center mt-1">{{ $seminars->links() }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- PROJECTS -->
    <div class="projects" id="project-seminar-list">
        <div class="container">
            <h2 class="text-center mb-3 mt-5 deep-blue-color">Projects List</h2>
            <div class="row card-wrapper">
                <!-- project card starts here -->
                @foreach ($projects as $project)
                    <div class="col-md-4 mb-3">
                        <div class="card project-main-card">
                            <div class="card-body">
                                <span class="badge text-bg-primary mb-2 font-poppins"><i class="bi bi-book-fill">
                                        project</i></span>
                                <h5 class="card-title">
                                    <a
                                        href="{{ url('project-details/' . $project->uuid) }}" class="project-title">{{ $project->project_topic }}</a>
                                </h5>
                                <p class="card-text project-description">
                                    {{ $project->project_desc }}
                                </p>
                                <div class="row mb-3">
                                    <div class="col">
                                        <span class="me-3 fs-6 timestamp">Published on <br><i
                                                class="bi bi-clock-fill fs-6"></i>
                                            {{ $project->updated_at }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">{{ $projects->links() }}</div>
                <!-- ends here -->
            </div>
            <h2 class="text-center mb-3 mt-5 deep-blue-color">Seminars List</h2>
            <div class="row card-wrapper">
                <!-- seminar card starts here -->
                @foreach ($seminars as $seminar)
                    <div class="col-md-4 mb-3">
                        <div class="card project-main-card">
                            <div class="card-body">
                                <span class="badge text-bg-primary mb-2 font-poppins"><i class="bi bi-book-fill">
                                        seminar</i></span>
                                <h5 class="card-title">
                                    <a
                                        href="{{ url('seminar-details/' . $seminar->uuid) }}">{{ $seminar->seminar_topic }}</a>
                                </h5>
                                <p class="card-text">
                                    {{ $seminar->seminar_desc }}
                                </p>
                                <div class="row mb-3">
                                    <div class="col">
                                        <span class="me-3 fs-6 timestamp">Published on <br><i
                                                class="bi bi-clock-fill fs-6"></i>
                                            {{ $seminar->updated_at }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">{{ $seminars->links() }}</div>
                <!-- ends here -->
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
                                <i class="bi bi-chevron-right text-white"></i> <a href="{{ url('/') }}"
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
                            <li class="mt-2">
                                <i class="bi bi-chevron-right text-white"></i> <a href="{{ url('register') }}"
                                    class="text-white quick-links">Register</a>
                            </li>
                            <li class="mt-2">
                                <i class="bi bi-chevron-right text-white"></i> <a href="{{ url('login') }}"
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
                    &copy; CopyRight Reserved 2023</p>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/omitter.min.js') }}"></script>
        <script>
window.addEventListener("load", function (event){
  // var doms = $(".omitter-target");
  var doms = document.querySelectorAll(".project-description");
  var omitter = new Omitter(doms, 4, "..."); // limit to 3 lines.
  omitter.omit();
});

window.addEventListener("load", function (event){
  // var doms = $(".omitter-target");
  var doms = document.querySelectorAll(".project-title");
  var omitter = new Omitter(doms, 2, "..."); // limit to 3 lines.
  omitter.omit();
});

        </script>
</body>

</html>
