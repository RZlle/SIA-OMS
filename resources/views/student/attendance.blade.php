@extends('layout.student-master')
@section('title', 'Student | Daily Diary Tasks')

@section('content-header')
    <h1 class="pull-left">Attendance<small>Welcome to your Attendance Page</small></h1>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Attendance</li>
        </ol>
    </div>
@endsection

@section('main-content')
<form id="attendanceForm" action="{{ route('attendInput') }}" method="POST">
    @csrf
    <div class="form-group">
        <label class="control-label"><strong><i class="icon-calendar"></i> Date Now</strong></label>
        <input name="attendDate" type="text" class="form-control" value="{{ now()->format('d-m-y') }}" disabled />
    </div>
    <div class="cs-form">
        <label class="control-label"><strong><i class="icon-clock"></i> Time in</strong></label>
        <input type="time" class="form-control" name="timeIn" required />
    </div>
    <div class="cs-form">
        <label class="control-label"><strong><i class="icon-clock"></i> Time out</strong></label>
        <input type="time" class="form-control" name="timeOut" required />
    </div>
    <div class="cs-form">
        <button name= "" type="submit" class="btn btn-primary">Record Attendance</button>
    </div>
</form>

<div id="success-message" class="alert alert-success" style="display: none;">
    Attendance recorded successfully.
</div>



<div class="row">


<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
                <a>Attendance</a>
        </div>
        <div class="panel-body">
            <table id="attendance-table" class="table table-striped table-bordered">
                <thead>
                    <th>Date</th>
                    <th>Time in</th>
                    <th>Time out</th>
                </thead>
                <tbody>
                    @foreach ($attendance as $attend)
                        <tr>
                            <td>{{ $attend->attendDate}}</td>
                            <td>{{ $attend->timeIn}}</td>
                            <td>{{ $attend->timeOut }}</td>
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

            $('#attendanceForm').validate({
                rules: {
                    attendDate: {
                        required: true
                    },
                    timeIn: {
                        required: true
                    },
                    timeOut: {
                        required: true,
                    }

                },
                messages: {
                    attendDate: {
                        required: ''
                    },
                    timeIn: {
                        required: 'Time In is required'
                    },
                    timeOut: {
                        required: 'Time Out is required',
                        greaterThanDate: 'Time in should not be less than Time out'
                    }
                }
            });



            $('#createBtn').click(function() {

                if ($('#attendanceForm').valid()) {
                    // Your existing AJAX call
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('attendInput') }}', // Update the URL to match your route
                        data: $('#attendanceForm').serialize(),
                        success: function(response) {
                            Swal.fire({
                                title: "Good job!",
                                text: "Attendance Recorded successfully!",
                                icon: "success",
                                confirmButtonText: 'Okay'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href =
                                        '/student/attendance';
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
