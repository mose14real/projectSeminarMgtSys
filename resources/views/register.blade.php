<!DOCTYPE html>
<html lang="en">

<x-head-tag-link title="Register | Page" />

<body>
    <!-- REGISTRATION SECTION STARTS HERE -->
    <div class="registration-section">
        <div class="row">
            <!-- content register section starts here -->
            <div class="col-md-6 content-register">
                <div class="overlay pt-4">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('register') }}">Register</a></li>
                        </ol>
                    </nav>
                    <x-sidebar />
                </div>
            </div>
            <!-- form register section starts here -->
            <div class="col-md-6 pt-4 form-register">
                <h4 class="deep-blue-color">Registration</h4>
                <form class="mt-3" action="{{ route('store') }}" method="POST">
                    <div class="container">
                        @include('flash-message')
                        @yield('content')
                    </div>
                    @csrf
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name"
                            value="{{ old('first_name') }}">
                        @if ($errors->has('first_name'))
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" placeholder="Middle Name" name="middle_name"
                            value="{{ old('middle_name') }}">
                        @if ($errors->has('middle_name'))
                            <span class="text-danger">{{ $errors->first('middle_name') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                            value="{{ old('last_name') }}">
                        @if ($errors->has('last_name'))
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email"
                            value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" placeholder="Matric Number i.e 16/69/0000"
                            name="matric" value="{{ old('matric') }}">
                        @if ($errors->has('matric'))
                            <span class="text-danger">{{ $errors->first('matric') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="tel" class="form-control" placeholder="Phone Number" name="phone"
                            value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" placeholder="Supervisor" name="supervisor"
                            value="{{ old('supervisor') }}">
                        @if ($errors->has('supervisor'))
                            <span class="text-danger">{{ $errors->first('supervisor') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" placeholder="Session i.e 2021/2022" name="session"
                            value="{{ old('session') }}">
                        @if ($errors->has('session'))
                            <span class="text-danger">{{ $errors->first('session') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword">
                        @if ($errors->has('cpassword'))
                            <span class="text-danger">{{ $errors->first('cpassword') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-block w-100 register-page-btn">Register</button>
                        <div class="clearfix"></div>
                    </div>
                    <p class="text-center">Already Have An Account?🤔 Kindly <a href="{{ route('login') }}">Login</a>
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
