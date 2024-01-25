<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FacultyController extends Controller
{
    //
    public function facultyInfoRetrieve()
    {
        $facultyMembers = Faculty::all();

        if ($facultyMembers->count() > 0) {
            return response()->json([
                'status' => 200,
                'facultyMembers' => $facultyMembers
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }

    public function facultyInfoInput(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'accountId' => 'required|exists:accounts,id',
            'lastName' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:3',
            'address' => 'required|string|max:255',
            'birthday' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $facultyMember = Faculty::create([
                'accountId' => $request->accountId,
                'lastName' => $request->lastName,
                'firstName' => $request->firstName,
                'middleName' => $request->middleName,
                'suffix' => $request->suffix,
                'address' => $request->address,
                'birthday' => $request->birthday,
            ]);

            if ($facultyMember) {
                return response()->json([
                    'status' => 200,
                    'message' => "Faculty Member Created Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something Went Wrong"
                ], 500);
            }
        }
    }

    public function facultyInfoShow($id)
    {
        $facultyMember = Faculty::find($id);

        if ($facultyMember) {
            return response()->json([
                'status' => 200,
                'facultyMember' => $facultyMember
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function facultyInfoEdit($id)
    {
        $facultyMember = Faculty::find($id);

        if ($facultyMember) {
            return response()->json([
                'status' => 200,
                'facultyMember' => $facultyMember
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function facultyInfoUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'accountId' => 'nullable|exists:accounts,id',
            'lastName' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:3',
            'address' => 'required|string|max:255',
            'birthday' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $facultyMember = Faculty::find($id);

            if ($facultyMember) {
                $facultyMember->update([
                    'accountId' => $request->accountId,
                    'lastName' => $request->lastName,
                    'firstName' => $request->firstName,
                    'middleName' => $request->middleName,
                    'suffix' => $request->suffix,
                    'address' => $request->address,
                    'birthday' => $request->birthday,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Faculty Member Updated Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Such Record Found"
                ], 404);
            }
        }
    }

    public function facultyInfoSoftDelete($id)
    {
        $faculty = Faculty::withTrashed()->find($id);

        if ($faculty) {
            $faculty->delete();

            return response()->json([
                'status' => 200,
                'message' => "Faculty Soft Deleted Successfully"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Record Found"
            ], 404);
        }
    }

    public function facultyInfoHardDelete($id)
    {
        $faculty = Faculty::find($id);

        if ($faculty) {
            $faculty->forceDelete();

            return response()->json([
                'status' => 200,
                'message' => "Faculty Hard Deleted Successfully"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Record Found"
            ], 404);
        }
    }
}
