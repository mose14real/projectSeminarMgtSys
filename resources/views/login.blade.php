<!DOCTYPE html>
<html lang="en">

<x-head-tag-link title="Login | Page" />

<body>
    <!-- REGISTRATION SECTION STARTS HERE -->
    <div class="registration-section">
        <div class="row">
            <!-- content register section starts here -->
            <div class="col-md-6 content-register">
                <div class="overlay pt-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('login') }}">Login</a></li>
                        </ol>
                    </nav>
                    <x-sidebar />
                </div>
            </div>
            <!-- form register section starts here -->

            <div class="col-md-6 pt-4 d-flex align-items-center justify-content-center flex-column form-register">
                <h4 class="deep-blue-color text-start d-block">Login</h4>
                <div class="container">
                    @include('flash-message')
                    @yield('content')
                </div>

                <form class="mt-3" action="{{ route('auth-login') }}" method="POST">
                    @csrf
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email"
                            value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-block w-100 register-page-btn">Login</button>
                        <div class="clearfix"></div>
                    </div>
                    <p class="text-center">Don't have an Account?🤔 Kindly <a
                            href="{{ route('register') }}">Register</a>
                    </p>
                    <p class="text-center"><a href="{{ route('/') }}">Back to Home Page</a> </p>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
