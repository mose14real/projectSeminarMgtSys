<x-head-tag-link title="Student | Show-Profile | Page" />

<!-- NAVBAR SECTION STARTS HERE -->
<x-nav-bar-student />

<div class="user-details-section mb-5">
    <div class="container">
        <h2 class="mt-5">Personal Information</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="mt-5">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">First Name</th>
                                <td>{{ $student->user->first_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Middle Name</th>
                                <td>{{ $student->user->middle_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Last Name</th>
                                <td>{{ $student->user->last_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $student->user->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Matric Number</th>
                                <td>{{ $student->matric }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone Number</th>
                                <td>{{ $student->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Supervisor</th>
                                <td>{{ $student->supervisor }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Session</th>
                                <td>{{ $student->session }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 mb-3">
                    <a href="{{ url('/student/profile/edit') }}/{{ auth()->user()->student->uuid }}"><button
                            type="submit" class="btn btn-block w-25 register-page-btn">Edit Profile</button>
                        <div class="clearfix"></div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('img/5.svg') }}" alt="" style="width:300px;margin-left:50px;">
            </div>
        </div>
    </div>
</div>

<!-- FOOTER SECTION -->
<x-footer-student />
