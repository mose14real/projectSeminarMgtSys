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
                    <button type="submit" class="btn btn-block ms-2 search-btn"><i class="bi bi-search"></i></button>
                </li>
            </ul>

            <li class="nav-item dropdown me-5">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-person-circle"> {{ auth()->user()->student->matric }}</i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item"
                            href="{{ url('student/profile/show') }}/{{ auth()->user()->student->uuid }}"><i
                                class="bi bi-person-badge-fill"></i>
                            Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a href="{{ route('logout') }}"><button class="btn btn-block d-block mx-auto sign-out-btn">Log
                                Out</button></a></li>
                </ul>
            </li>

            <!-- notification -->
            <li class="nav-item notification-wrapper">
                <i class="bi bi-bell-fill position-relative fs-5 text-white notification-bell" data-bs-toggle="modal"
                    data-bs-target="#modalId">
                    <span class="position-absolute start-100 translate-middle bg-danger rounded-circle notification">
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

<!-- Flash Message -->
<div class="container">
    @include('flash-message')
    @yield('content')
</div>
