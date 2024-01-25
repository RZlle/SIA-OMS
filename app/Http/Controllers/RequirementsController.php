<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Requirements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class RequirementsController extends Controller
{
    public function RequirementsInfoRetrieve()
    {
        $requirements = Requirements::all();

        if ($requirements->count() > 0) {
            return view('program-adviser.program-adviser-requirements', compact('requirements'));
        } else {
            return view('program-adviser.program-adviser-requirements', compact('requirements'))->with('status', 404)->with('message', 'No Records Found');
        }
    }

    public function RequirementsInfoInput(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'studentId' => 'nullable|integer',
            'facultyId' => 'nullable|integer',
            'dateSubmitted' => 'required|date',
            'reqFile' => 'required|string|max:255',
            'reqName' => 'required|string|max:255',
            'reqType' => 'nullable|string|max:255',
            'reqStatus' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 422,
                'message' => $validator->messages()
            ];

            return response()->json($data, 422);
        } else {
            // File handling logic
            if ($request->hasFile('reqFile')) {
                $file = $request->file('reqFile');
                $fileName = time() . '.' . $file->getClientOriginalName();
                $file->move('assets', $fileName);
            }

            $requirements = Requirements::create([
                'studentId' => $request->studentId,
                'facultyId' => $request->facultyId,
                'dateSubmitted' => $request->dateSubmitted,
                'reqFile' => isset($fileName) ? $fileName : null,
                'reqName' => $request->reqName,
                'reqType' => $request->reqType,
                'reqStatus' => $request->reqStatus,
            ]);

            if ($requirements) {
                return view('program-adviser.program-adviser-requirements', compact('requirements'));
            } else {
                return view('program-adviser.program-adviser-requirements', compact('requirements'))->with('status', 404)->with('message', 'No Records Found');
            }
        }
    }

    public function downloadAttachment (Request $request, $file)
    {

        return response()->download(public_path('assets/'.$file));

    }



    public function RequirementsInfoShow($id)
    {
        $requirements = Requirements::find($id);

        if ($requirements) {
            return response()->json([
                'status' => 200,
                'requirements' => $requirements
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }


    public function RequirementsInfoEdit($id)
    {
        $requirements = Requirements::find($id);

        if ($requirements) {
            return response()->json([
                'status' => 200,
                'requirements' => $requirements
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function RequirementsInfoUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'studentId' => 'nullable|integer',
            'facultyId' => 'nullable|integer',
            'dateSubmitted' => 'required|date',
            'reqFile' => 'required|string|max:255',
            'reqName' => 'required|string|max:255',
            'reqType' => 'nullable|string|max:255',
            'reqStatus' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $requirements = Requirements::find($id);

            if ($requirements) {
                $requirements->update([
                    'studentId' => $request->studentId,
                    'facultyId' => $request->facultyId,
                    'dateSubmitted' => $request->dateSubmitted,
                    'reqFile' => $request->reqFile,
                    'reqName' => $request->reqName,
                    'reqType' => $request->reqType,
                    'reqStatus' => $request->reqStatus,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Requirements Updated Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Such Record Found"
                ], 404);
            }
        }
    }

    public function RequirementsInfoSoftDelete($id)
    {
        $requirements = Requirements::withTrashed()->find($id);

        if ($requirements) {
            $requirements->delete();

            return response()->json([
                'status' => 200,
                'message' => "Requirements Soft Deleted Successfully"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Record Found"
            ], 404);
        }
    }

    public function RequirementsInfoHardDelete($id)
    {
        $requirements = Requirements::find($id);

        if ($requirements) {
            $requirements->forceDelete();

            return response()->json([
                'status' => 200,
                'message' => "Requirements Hard Deleted Successfully"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Record Found"
            ], 404);
        }
    }
}
