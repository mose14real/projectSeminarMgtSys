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
                            class="text-white quick-links">Dashboard</a>
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
<script src="{{ asset('js/app.js') }}"></script>

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

</body>

</html>
