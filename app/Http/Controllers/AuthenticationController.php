<?php

namespace App\Http\Controllers;

use App\Models\Identification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login () {
        return view('authentication.login');
    }

    public function login_user (Request $request) {
        // validate the request
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        // authenticate user
        if (Auth::attempt($credentials)) {
            // page to go to when successfully login
            return redirect('/employee');
        }

        // else failed
        return back()->with('error', 'Failed to login. (username or password is incorrect)');
    }

    public function logout_user () {
        // log out the user
        Auth::logout();
        return redirect('/login')->with('info', 'user has logout.');
    }


    // Employee login
    // employee login functions
    public function login_employee_page()
    {
        return view('authentication.employeeLogin');
    }

    public function login_employee(Request $request)
    {
        // validate the request
        $credentials = $request->validate([
            'employee_id' => ['required'],
        ]);

        // get the employee information
        $employee = Identification::query()->where('employee_id', '=', $credentials['employee_id'])->first();

        // dd($employee[0]);

        if ($employee) {
            // authenticate user
            session()->put('Employee_user', $employee);

            // page to go to when successfully login
            return redirect()->route('details');
        }

        // else failed
        return back()->with('error', 'Failed to login. (no employee is listed with that ID.)');
    }

    public function logout_employee(Request $request)
    {
        // log out the employee
        $request->session()->flush();
        session()->forget('employee_user');

        return redirect('/employeeLogin')->with('info', 'employee has logout.');
    }
}
