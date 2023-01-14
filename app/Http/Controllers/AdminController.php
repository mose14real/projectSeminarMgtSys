<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function details()
    {
        return view('admin.details');
    }

    // public function register()
    // {
    //     return view('admin.register');
    // }

    // public function store(Request $request)
    // {
    //     //
    // }

    public function login()
    {
        return view('admin.login');
    }

    public function authLogin()
    {
        //
    }

    public function dashboard()
    {
        // if (Auth::check()) {

        //     return view('admin.dashboard');
        // }

        // return redirect("admin.login")->withSuccess('Opps! You do not have access');

        return view('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
