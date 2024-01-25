<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function studentInfoRetrieve()
    {
        $students = Student::all();

        if ($students->count() > 0) {
            return view('program-adviser.program-adviser-students', compact('students'));
        } else {
            return view('program-adviser.program-adviser-students', compact('students'))->with('status', 404)->with('message', 'No Records Found');
        }
    }

    public function studentInfoInput(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'accountId' => 'nullable|string|max:20',
            'studentNo' => 'required|string|max:13',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:3',
            'address'=>'nullable|string|max:255',
            'birthday' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $student = Student::create([
                'accountId' => $request->accountID,
                'studentNo' => $request->studentNo,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'middleName' => $request->middleName,
                'suffix' => $request->suffix,
                'address' => $request->address,
                'birthday' => $request->birthday
            ]);

            if($student){
                return response()->json([
                    'status' => 200,
                    'message' => "Student Create Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something Went Wrong"
                ],500);
            }
        }
    }

    public function studentInfoShow ($id)
    {
        $student = Student::find($id);
        if($student){
            return response()->json([
                'status' => 200,
                'students' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function studentInfoEdit ($id)
    {
        $student = Student::find($id);
        if($student){
            return response()->json([
                'status' => 200,
                'students' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function studentInfoUpdate (Request $request, Int $id)
    {
        $validator = Validator::make($request->all(), [
            'accountId' => 'nullable|string|max:20',
            'studentNo' => 'required|string|max:13',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:3',
            'address'=>'nullable|string|max:255',
            'birthday' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $student = Student::find($id);

            if($student){
                $student->update([
                    'accountId' => $request->accountID,
                    'studentNo' => $request->studentNo,
                    'firstName' => $request->firstName,
                    'lastName' => $request->lastName,
                    'middleName' => $request->middleName,
                    'suffix' => $request->suffix,
                    'address' => $request->address,
                    'birthday' => $request->birthday
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Student Updated Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Such Record Found"
                ],500);
            }
        }
    }

    public function studentInfoSoftDelete($id)
    {
        $student = Student::withTrashed()->find($id);

        if ($student) {
            $student->delete();

            return response()->json([
                'status' => 200,
                'message' => "Student Soft Deleted Successfully"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Record Found"
            ], 404);
        }
    }

    public function studentInfoHardDelete($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->forceDelete();

            return response()->json([
                'status' => 200,
                'message' => "Student Hard Deleted Successfully"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Record Found"
            ], 404);
        }
    }

}
