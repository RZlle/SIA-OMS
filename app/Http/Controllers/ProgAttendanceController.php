<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class ProgAttendanceController extends Controller
{
    public function ProgAttendanceShow()
    {
        $attendance = Attendance::all();

        if ($attendance->count() > 0) {
            return view('program-adviser.attendance-program', compact('attendance'));
        } else {
            return view('program-adviser.attendance-program', compact('attendance'))->with('status', 404)->with('message', 'No Records Found');
        }
    }
}
