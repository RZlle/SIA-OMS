@extends('layout.student-master')
@section('title', 'Student | Daily Diary Tasks')

@section('content-header')
    <h1 class="pull-left">Daily Diary Tasks<small>Welcome to your Daily Diary Task Page</small></h1>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Daily Diary Tasks</li>
        </ol>
    </div>
@endsection

@section('main-content')

    <style>
        .error {
            color: red;
        }
    </style>
    {{-- modal --}}
    <div id="modal-responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" class="close">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 id="myModalLabel" class="modal-title">Create a task</h4>
                </div>
                <div class="modal-body">
                    <div class="row man">
                        <form id="createTaskForm" action="{{ route('taskInput') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label"><strong>Task Name</strong></label>
                                <input type="text" name="taskName" placeholder="Enter task name..." class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="control-label"><strong><i class="icon-calendar"></i> Date
                                            Started</strong></label>
                                    <input name="dateStarted" id="datetimepicker_datepicker" type="text"
                                        class="form-control" autocomplete="off" placeholder="" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="control-label"><strong><i class="icon-calendar"></i> Date
                                            Accomplished</strong></label>
                                    <input name="dateAccomplished" id="datetimepicker_datepicker2" type="text"
                                        class="form-control" autocomplete="off" placeholder="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><strong>Task Description</strong></label>
                                <textarea id="taskdescription" name="taskdescription" cols="100" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><strong>File Upload:</strong></label>
                                <div data-provides="fileinput" class="fileinput fileinput-new">
                                    <div class="input-group">
                                        <div data-trigger="fileinput" class="form-control">
                                            <i class="icon-doc fileinput-exists"></i>&nbsp;<span
                                                class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-success btn-file"><span
                                                class="fileinput-new">Select file</span><span
                                                class="fileinput-exists">Change</span><input type="file"
                                                name="taskFile" /></span><a href="#" data-dismiss="fileinput"
                                            class="input-group-addon btn btn-danger fileinput-exists">Remove</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn white">Close</button>
                    <button type="submit" class="btn btn-primary">Create Task</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row mbl man">
        <button href="#modal-responsive" data-toggle="modal" class="btn btn-primary"><i class="icon-plus"></i> Create
            Task</button>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong class="text-uppercase text-success">Daily Tasks</strong></h3>
                </div>
                <div class="panel-body">
                    <table id="datatables" class="table table-striped table-bordered">
                        <thead class="bg-default">
                            <tr>
                                <th style="width: 30%;">Task</th>
                                <th>Date Accomplished</th>
                                <th>Status</th>
                                <th style="width: 10%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr row-id="{{ $task->taskId }}">
                                    <td>{{ $task->taskName }}</td>
                                    <td>
                                        @if ($task->dateAccomplished)
                                            {{ $task->dateAccomplished }}
                                        @else
                                            <span class="text-muted"> - </span>
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="label label-{{ $task->taskStatus === 'completed' ? 'success' : 'warning' }}">
                                            {{ $task->taskStatus }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" data-toggle="dropdown"
                                                class="btn btn-default dropdown-toggle">
                                                Actions &nbsp;<span class="caret"></span>
                                            </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a
                                                        href="{{ route('daily-task-specific', ['id' => $task->taskId]) }}">View</a>
                                                </li>
                                                <li><a href="{{ route('editTask', ['id' => $task->taskId]) }}">Edit</a></li>
                                                <li>
                                                    <form
                                                        action="{{ route('tasks.soft-delete', ['id' => $task->taskId]) }}"
                                                        method="POST" class="form-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link"
                                                            data-confirm-delete="true">Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            // $('#taskdescription').wysihtml5();

            $.validator.addMethod("extension", function(value, element, param) {
                param = typeof param === "string" ? param.replace(/,/g, '|') : "pdf";
                return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
            }, "Please upload a PDF file.");

            $('#createTaskForm').validate({
                rules: {
                    taskName: {
                        required: true
                    },
                    dateStarted: {
                        required: true
                    },
                    dateAccomplished: {
                        required: true,
                    },
                    taskdescription: {
                        required: true
                    },
                    taskFile: {
                        required: true,
                        extension: true
                    }
                },
                messages: {
                    taskName: {
                        required: 'Task name is required'
                    },
                    dateStarted: {
                        required: 'Date started is required'
                    },
                    dateAccomplished: {
                        required: 'Date accomplished is required',
                        greaterThanDate: 'Date accomplished should not be less than date started'
                    },
                    taskdescription: {
                        required: 'This field is required.'
                    },
                    taskFile: {
                        required: 'Attachment is required'
                    }
                }
            });



            $('#createBtn').click(function() {

                if ($('#createTaskForm').valid()) {
                    // Your existing AJAX call
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('taskInput') }}', // Update the URL to match your route
                        data: $('#createTaskForm').serialize(),
                        success: function(response) {
                            Swal.fire({
                                title: "Good job!",
                                text: "Task added successfully!",
                                icon: "success",
                                confirmButtonText: 'Okay'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href =
                                        '/student/daily-task';
                                }
                            });
                        },
                        error: function(error) {
                            console.log(error);
                            Swal.fire({
                                title: 'Error!',
                                text: 'Looks like there were some errors',
                                icon: 'error',
                                confirmButtonText: 'Okay'
                            });
                        }
                    });
                } else {
                    console.log('Validation failed');
                }
            });
        });
    </script>

@endsection
