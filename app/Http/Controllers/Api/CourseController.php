<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function courseInfoRetrieve()
    {
        $courses = Course::all();

        return response()->json([
            'status' => 200,
            'courses' => $courses,
        ], 200);
    }

    public function courseInfoShow($id)
    {
        $course = Course::find($id);

        if ($course) {
            return response()->json([
                'status' => 200,
                'course' => $course,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Course not found',
            ], 404);
        }
    }

    public function courseInfoStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'courseName' => 'required|string|max:255',
            'yearSem' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        }

        $course = Course::create([
            'courseName' => $request->input('courseName'),
            'yearSem' => $request->input('yearSem'),
        ]);

        return response()->json([
            'status' => 201,
            'message' => 'Course created successfully',
            'course' => $course,
        ], 201);
    }

    public function courseInfoUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'courseName' => 'required|string|max:255',
            'yearSem' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        }

        $course = Course::find($id);

        if ($course) {
            $course->update([
                'courseName' => $request->input('courseName'),
                'yearSem' => $request->input('yearSem'),
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Course updated successfully',
                'course' => $course,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Course not found',
            ], 404);
        }
    }

    public function courseInfoSoftDelete($id)
    {
        $student = Course::withTrashed()->find($id);

        if ($course) {
            $course->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Course soft deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Course not found',
            ], 404);
        }
    }

    public function courseInfoHardDelete($id)
    {
        $course = Course::find($id);

        if ($course) {
            $course->forceDelete();

            return response()->json([
                'status' => 200,
                'message' => 'Course hard deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Course not found',
            ], 404);
        }
    }
}
