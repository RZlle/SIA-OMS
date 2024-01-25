<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Stroage;


class TaskController extends Controller
{


    public function TaskInfoRetrieve()
    {
        $tasks = Task::all();

        if ($tasks->count() > 0) {
            return view('student.dailytask', compact('tasks'));
        } else {
            return view('student.dailytask', compact('tasks'))->with('status', 404)->with('message', 'No Records Found');
        }
    }

    public function TaskInfoInput(Request $request)
{
    $validator = Validator::make($request->all(), [
        'studentId' => 'nullable|integer',
        'taskName' => 'required|string|max:255',
        'taskStatus' => 'nullable|string|max:255',
        'dateAccomplished' => 'nullable',
        'taskdescription' => 'required|string',
        'taskFile' => 'nullable|max:2048', // Allow any type of file up to 2048 KB (adjust the size as needed)
        'dateStarted' => 'required',
    ]);

    if ($validator->fails()) {

        Alert::error('Error in creating task', 'It seems there were some errors');

        return redirect()->route('taskShow')->with([
            'status' => 422,
            'message' => 'Error creating task',
        ])->with('failed', true);

    } else {


        if ($request->dateAccomplished != null)
        {
            $dateAccomplished = Carbon::createFromFormat('d/m/Y', $request->dateAccomplished);

            $dateStarted = Carbon::createFromFormat('d/m/Y', $request->dateStarted);

            $file = $request->taskFile;

            $fileName = time().'.'.$file->getClientOriginalName();

            $request->taskFile->move('assets', $fileName);

            $tasks = Task::create([
                'studentId' => $request->studentId,
                'taskName' => $request->taskName,
                'taskStatus' => 'completed',
                'dateAccomplished' => $dateAccomplished->format('Y-m-d'),
                'taskdescription' => $request->taskdescription,
                'taskFile' => $fileName,
                'dateStarted' => $dateStarted->format('Y-m-d'),
            ]);
        }
        else
        {
            $dateStarted = Carbon::createFromFormat('d/m/Y', $request->dateStarted);

            $file = $request->taskFile;

            $fileName = time().'.'.$file->getClientOriginalName();

            $request->taskFile->move('assets', $fileName);

            $tasks = Task::create([
                'studentId' => $request->studentId,
                'taskName' => $request->taskName,
                'taskStatus' => 'pending',
                'dateAccomplished' => $dateAccomplished->format('Y-m-d'),
                'taskdescription' => $request->taskdescription,
                'taskFile' => $fileName,
                'dateStarted' => $dateStarted->format('Y-m-d'),
            ]);

        }

        Alert::success('Task creation successful!', 'Done');

        return redirect()->route('taskShow')->with([
            'status' => 200,
            'message' => 'Task Created Successfully',
        ])->with('success', true);
    }
}


    public function TaskInfoShow($id)
    {
        $task = Task::find($id);

        if ($task)
        {

            return view('student.specific-daily-task', compact('task'));

        }
        else
        {

            Alert::error('Error fetching task', 'Error fetching task data');

            return redirect()->route('taskShow');

        }

    }

    public function TaskShowForEdit($id)
    {
        $task = Task::find($id);

        if ($task)
        {

            return view('student.edit-daily-task', compact('task'));

        }
        else
        {

            Alert::error('Error fetching task', 'Error fetching task data');

            return redirect()->route('taskShow');

        }
    }

    public function downloadAttachment (Request $request, $file)
    {

        return response()->download(public_path('assets/'.$file));

    }

    public function TaskInfoEdit($id)
    {
        $task = Task::find($id);

        if ($task) {
            return response()->json([
                'status' => 200,
                'task' => $task
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Record Found'
            ], 404);
        }
    }

    public function TaskInfoUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'studentId' => 'nullable|integer',
            'taskName' => 'required|string|max:255',
            'taskStatus' => 'nullable|string|max:255',
            'dateAccomplished' => 'nullable',
            'taskdescription' => 'required|string',
            'taskFile' => 'nullable|max:2048', // Allow any type of file up to 2048 KB (adjust the size as needed)
            'dateStarted' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Error in updating task', 'It seems there were some errors');

            return redirect()->route('taskShow')->with([
                'status' => 422,
                'message' => 'Error updating task',
            ])->with('failed', true);
        } else {
            $task = Task::find($id);

            if ($task) {
                $task->update([
                    'studentId' => $request->studentId,
                    'taskName' => $request->taskName,
                    'taskStatus' => 'pending',
                    'dateAccomplished' => $dateAccomplished->format('Y-m-d'),
                    'taskdescription' => $request->taskdescription,
                    'taskFile' => $fileName,
                    'dateStarted' => $dateStarted->format('Y-m-d'),
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Task Updated Successfully"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Such Record Found"
                ], 404);
            }
        }
    }

    public function TaskInfoSoftDelete($id)
    {
        $task = Task::withTrashed()->find($id);

        if ($task) {
                $task->delete();

                Alert::success('Task deleted', 'Task has been deleted');

                return redirect()->route('taskShow')->with('task', $task)->with('status', 200)->with('message', 'Task Deleted Successfully');
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Record Found"
            ], 404);
        }
    }


    public function TaskInfoHardDelete($id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->forceDelete();

            return response()->json([
                'status' => 200,
                'message' => "Task Hard Deleted Successfully"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Record Found"
            ], 404);
        }
    }

}
