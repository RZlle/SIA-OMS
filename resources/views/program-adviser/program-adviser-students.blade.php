@extends('layout.program-adviser-master')
@section('title', 'Program Adviser | Student Management')

@section('content-header')

    <h1 class="pull-left">Student Management<small>Welcome Program Adviser!</small></h1>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Student Management</li>
        </ol>
    </div>

@endsection

@section('main-content')
<div>
    <div>
        <div>
            <div>
                <!-- Attendance Table -->
                <table id="attendance-table" class="table table-striped table-bordered">
                    <thead>
                        <th>Student No</th>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Section</th>
                        <th>Year Level</th>
                    </thead>
                    <tbody>
                              <!-- for each -->
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> <!-- Assuming you have a field like studentName -->
                            </tr>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
