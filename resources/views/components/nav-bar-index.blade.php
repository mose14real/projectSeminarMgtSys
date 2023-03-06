<nav class="navbar navbar-expand-lg" id="navigation-bar">
    <div class="container">
        <h1 class="navbar-brand font-bold text-white"><i class="bi bi-box-seam-fill">
                ProjectArch</i></h1>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-white active" aria-current="page" href="{{ route('/') }}">Home</a>
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
                <a href="{{ route('register') }}" class="">
                    <button class="btn btn-block shadow-none register-btn">Register</button>
                </a>
                <a href="{{ route('login') }}" class="ms-3 mt-2">
                    <button class="btn btn-block shadow-none login-btn">Login</button>
                </a>
            </div>
        </div>
    </div>
</nav>
