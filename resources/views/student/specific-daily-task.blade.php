@extends('layout.student-master')
@section('title', 'Student | Daily Diary Tasks')

@section('content-header')
    <h1 class="pull-left">
        Daily Diary Tasks<small>Welcome to your Daily Diary Task Page</small></h1>
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
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="">
                    <h4 class="pbm border-bottom"><strong class="text-uppercase text-info">Task Details</strong></h4>

                    <div class="row">

                        <div class="col-md-9">

                            <div class="form-group">

                                <label class="control-label col-md-3" for="">Task Name: </label>

                                <div class="col-md-9">

                                    <p class="form-control-static">{{ $task->taskName }}</p>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-9">

                            <div class="form-group">

                                <label for="" class="control-label col-md-3"> Task Description: </label>

                                <div class="col-md-9">

                                    <p class="form-control-static">{{ $task->taskdescription }}</p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-9">

                            <div class="form-group">

                                <label for="" class="control-label col-md-3"> Date Started: </label>

                                <div class="col-md-9">

                                    <p class="form-control-static">{{ $task->dateStarted }}</p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-9">

                            <div class="form-group">

                                <label for="" class="control-label col-md-3"> Date Accomplished: </label>

                                <div class="col-md-9">

                                    @if (isset($task->dateAccomplished) && !empty($task->dateAccomplished))
                                        <p class="form-control-static">{{ $task->dateAccomplished }}</p>
                                    @else
                                        <p class="form-control-static">-</p>
                                    @endif

                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-md3"></div>
                                <div class="max col-md-9">
                                    <div class="row">
                                        <a class="btn btn-info" href="{{ url('/download', $task->taskFile) }}">Download
                                            Attachment</a>
                                            <a class="btn btn-warning" href="{{ route('editTask', ['id' => $task->taskId]) }}">Edit File</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <div class="col-md-6">
        <iframe height="800" width="800" src="/assets/{{ $task->taskFile }}" frameborder="0"></iframe>
    </div>

@endsection

@section('scripts')


    <script>
        $(document).ready(function() {

            // $('.doc-viewer').viewer({
            //     navbar: false, // You can customize the options based on your needs
            //     title: false,
            //     toolbar: {
            //         zoomIn: 1,
            //         zoomOut: 1,
            //         oneToOne: 1,
            //         reset: 1,
            //         prev: 0,
            //         play: {
            //             show: 0,
            //             size: 'large',
            //         },
            //         next: 0,
            //         rotateLeft: 1,
            //         rotateRight: 1,
            //         flipHorizontal: 1,
            //         flipVertical: 1,
            //     },
            // });

        });
    </script>


@endsection
