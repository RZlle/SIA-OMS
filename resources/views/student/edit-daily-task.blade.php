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

    <div class="masm">
        <a href="{{ route('taskShow') }}" id="back-btn"><i class="fa fa-arrow-left fa-lg"></i>
            <span><strong>Back</strong></span></a>
    </div>
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title pbm"><strong class="text-uppercase text-success">Edit Task</strong></h3>
            </div>
            <div class="panel-body form">
                <div class="form-body">
                    <form class="form-horizontal" action="">
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">Task Name:</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="{{ $task->taskName }}" name="taskName"
                                    id="taskName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">Task Description:</label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="" id="" cols="10" rows="10">{{ $task->taskdescription }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">Date Started: </label>
                            <div class="col-md-4">
                                <input name="dateStarted" id="datetimepicker_datepicker" type="text" class="form-control"
                                    autocomplete="off" placeholder="" value="{{ $task->dateStarted }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="">Date Accomplished: </label>
                            <div class="col-md-4">
                                <input name="dateAccomplished" id="datetimepicker_datepicker2" type="text"
                                    class="form-control" autocomplete="off" placeholder=""
                                    value="{{ $task->dateAccomplished }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">File Upload:</label>
                            <div class="col-md-4">
                                <div data-provides="fileinput" class="fileinput fileinput-new">
                                    <div class="input-group">
                                        <div data-trigger="fileinput" class="form-control">
                                            <i class="icon-doc fileinput-exists"></i>&nbsp;
                                            <span class="fileinput-filename" id="file-input-filename">
                                                {{ $task->taskFile }} <!-- Display the current file name -->
                                            </span>
                                        </div>
                                        <span class="input-group-addon btn btn-success btn-file">
                                            <span class="fileinput-new">Select file</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="taskFile" id="taskFileInput" />
                                        </span>
                                        <a href="#" data-dismiss="fileinput"
                                            class="input-group-addon btn btn-danger fileinput-exists">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-3"></span>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <script></script>

@endsection
