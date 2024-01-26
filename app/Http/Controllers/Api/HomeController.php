<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function studentHome()
    {
        return view('student.dashboard');
    }

    public function facultyHome()
    {
        return view('program-adviser.program-adviser-dashboard');
    }

    public function ojtCoordinatorHome()
    {
        return view('ojt-coordinator.ojt-coordinator-dashboard');
    }
}
