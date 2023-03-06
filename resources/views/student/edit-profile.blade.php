<x-head-tag-link title="Student | Edit-Profile | Page" />

<!-- NAVBAR SECTION STARTS HERE -->
<x-nav-bar-student />

<div class="user-details-section mb-5">
    <div class="container">
        <h2 class="mt-5">Personal Information</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <form class="mt-3" action="{{ url('student/profile/update', $student->uuid) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" name="first_name"
                            value="{{ $student->user->first_name }}" readonly>
                        @if ($errors->has('first_name'))
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" name="middle_name"
                            value="{{ $student->user->middle_name }}" readonly>
                        @if ($errors->has('middle_name'))
                            <span class="text-danger">{{ $errors->first('middle_name') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" name="last_name"
                            value="{{ $student->user->last_name }}" readonly>
                        @if ($errors->has('last_name'))
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="email" class="form-control" name="email" value="{{ $student->user->email }}"
                            readonly>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" name="matric" value="{{ $student->matric }}"
                            readonly>
                        @if ($errors->has('matric'))
                            <span class="text-danger">{{ $errors->first('matric') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" name="phone" value="{{ $student->phone }}">
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" name="supervisor" value="{{ $student->supervisor }}"
                            readonly>
                        @if ($errors->has('supervisor'))
                            <span class="text-danger">{{ $errors->first('supervisor') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" name="session" value="{{ $student->session }}"
                            readonly>
                        @if ($errors->has('session'))
                            <span class="text-danger">{{ $errors->first('session') }}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-block w-25 register-page-btn">Update</button>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('img/5.svg') }}" alt="" style="width:300px;margin-left:50px;">
            </div>
        </div>
    </div>
</div>

<!-- FOOTER SECTION -->
<x-footer-student />
