<!DOCTYPE html>
<html lang="en">

<x-head-tag-link title="Home | Page" />

<body>
    <!-- NAVBAR SECTION STARTS HERE -->
    <x-nav-bar-index />

    <div class="page-wrapper">
        <!-- HEADER SECTION STARTS HERE -->
        <header class="header-section d-flex align-items-center justify-content-center flex-column" id="header">
            <div class="container">
                <h1 class="text-center header-text"><i class="fas fa-book-open-cover">School Project & Seminar
                        Management System</i></h1>
                <p class="mt-3 text-center text-white">
                    The web-based project focuses on creating a platform for project and seminar registration,
                    archival,
                    and retrieval. It aims to streamline the process of project and seminar registration, storage of
                    project and seminar related information, and easy retrieval of this information. Users can
                    register
                    for projects, seminars, access archives of past project implementation and seminars, and
                    retrieve
                    information such as the information of different projects and seminars topics and students that
                    did
                    it. The project utilizes user-friendly interface design, secure database technology, and
                    efficient
                    information archival and retrieval techniques to provide a seamless experience for all users.
                    The
                    project utilizes user-friendly interface design, secure database technology, and efficient
                    information archival and retrieval techniques to provide a seamless experience for all users.
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
                                        <a href="{{ url('project-details/' . $project->uuid) }}"
                                            class="title">{{ $project->project_topic }}</a>
                                    </h5>
                                    <p class="card-text description">
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
                                        <a href="{{ url('seminar-details/' . $seminar->uuid) }}"
                                            class="title">{{ $seminar->seminar_topic }}</a>
                                    </h5>
                                    <p class="card-text description">
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
        </div>

        <!-- FOOTER SECTION -->
        <x-footer-index />
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/omitter.min.js') }}"></script>
    <script>
        window.addEventListener("load", function(event) {
            var doms = document.querySelectorAll(".title");
            var omitter = new Omitter(doms, 1, "...");
            omitter.omit();
        });

        window.addEventListener("load", function(event) {
            var doms = document.querySelectorAll(".description");
            var omitter = new Omitter(doms, 4, "...");
            omitter.omit();
        });
    </script>
</body>

</html>
