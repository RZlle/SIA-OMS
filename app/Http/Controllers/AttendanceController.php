<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class AttendanceController extends Controller
{
    /**
     * Store a newly recorded attendance in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AttendInfoRetrieve()
    {
        $attendance = Attendance::all();

        if ($attendance->count() > 0) {
            return view('program-adviser.attendance-program', compact('attendance'));
        } else {
            return view('program-adviser.attendance-program', compact('attendance'))->with('status', 404)->with('message', 'No Records Found');
        }
    }
    
    public function AttendanceInput(Request $request)
    {
        // $user = Auth::user();
        $request->merge(['attendDate' => Carbon::now()->format('Y-m-d')]);

        $validator = Validator::make($request->all(), [
            'attendDate' => 'required|date',
            'timeIn' => 'required|date_format:H:i',
            'timeOut' => 'required|date_format:H:i',
        ]);

        if ($validator->fails()) {
            Alert::error('Error in recording attendance', 'It seems there were some errors');
            return redirect()->route('attendInput')->withErrors($validator)->with('failed', true);
        } else {
            $attendance = Attendance::create([
                // Uncommented and fixed the typo
                // $user->studentId, // Assuming the column name is 'studentId' in your users table
                'attendDate' => Carbon::now()->toDateString(),
                'timeIn' => $request->input('timeIn'),
                'timeOut' => $request->input('timeOut'),
            ]);
        }

        Alert::success('Attendance Recorded!', 'Done');

        return redirect()->route('attendInput')->with([
            'status' => 200,
            'message' => 'Attendance Recorded Successfully',
        ])->with('success', true);
    }
}
