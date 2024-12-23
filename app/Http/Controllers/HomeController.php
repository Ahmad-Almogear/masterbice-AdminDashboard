<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    /** home dashboard */
    public function index()
    {
        $totalStudent = \App\Models\Student::count();
        $totalDepartment = \App\Models\Department::count();
        $totalTeacher = \App\Models\Teacher::count();

        // $user = auth()->user();
        return view('dashboard.home',compact('totalStudent','totalDepartment', 'totalTeacher'));
    }

    /** profile user */
    public function userProfile()
    {
        $user = auth()->user();
        return view('dashboard.profile');
    }

    /** teacher dashboard */
    public function teacherDashboardIndex()
    {
        return view('dashboard.teacher_dashboard');
    }

    /** student dashboard */
    public function studentDashboardIndex()
    {
        return view('dashboard.student_dashboard');
    }
}
