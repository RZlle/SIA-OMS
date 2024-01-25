<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function attendanceshow () {
        return view('student.dashboard');
    }
}
