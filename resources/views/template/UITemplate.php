<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- BOOTSTRAP CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <!-- BOOTSTRAP ICONS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" integrity="sha512-5PV92qsds/16vyYIJo3T/As4m2d8b6oWYfoqV+vtizRB6KhF1F9kYzWzQmsO6T3z3QG2Xdhrx7FQ+5R1LiQdUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <h1 class="navbar-brand font-bold text-white " href="#"><i class="bi bi-box-seam-fill"></i> ProjectArch</h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
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
          <a class="nav-link text-white " href="#">Seminars</a>
        </li>
      </ul>
      <!-- register and login button wrapper -->
      <div>
        <a href="" class="">
            <button class="btn btn-block shadow-none register-btn">Register</button>
        </a>
        <a href="" class="ms-3 mt-2">
            <button class="btn btn-block shadow-none login-btn">Login</button>
        </a>
      </div>
    </div>
  </div>
</nav>

<!-- FOOTER SECTION STARTS HERE -->
<footer class="mt-5">
  <div class="container">
    <div class="row">

        <!-- ProjectArch -->
        <div class="col-sm-6 p-3 mb-3">
          <a href="#">
            <h4 class="text-white mt-3"><i class="bi bi-box-seam-fill"></i> ProjectArch</h4>
          </a>
          <p class="text-white mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui atque et, ipsum laboriosam, voluptatibus consequatur distinctio suscipit recusandae cupiditate quam voluptatem eius animi
          </p>
        </div>

        <!-- quick links -->
        <div class="col-sm-3 p-3 mb-3">
          <h5 class="text-white mt-3">Quick Links</h5>
          <ul>
            <li class="mt-3">
              <i class="bi bi-chevron-right text-white"></i> <a href="#" class="text-white quick-links">Home</a>
            </li>
            <li class="mt-2">
              <i class="bi bi-chevron-right text-white"></i> <a href="#" class="text-white quick-links">Projects</a>
            </li>
            <li class="mt-2">
              <i class="bi bi-chevron-right text-white"></i> <a href="#" class="text-white quick-links">Seminars</a>
            </li>
            <li class="mt-2">
              <i class="bi bi-chevron-right text-white"></i> <a href="#" class="text-white quick-links">Register</a>
            </li>
            <li class="mt-2">
              <i class="bi bi-chevron-right text-white"></i> <a href="#" class="text-white quick-links">Login</a>
            </li>
          </ul>
        </div>

        <!-- social links -->
        <div class="col-sm-3 p-3 mb-3">
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
    <p class="text-center text-white">Created with ❤ By <a href="#" class="dev-opt">Developer</a> &copy; CopyRight Reserved 2022</p>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>