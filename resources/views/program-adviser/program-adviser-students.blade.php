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


<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <a>Students Lists</a>
            </div>
            <div class="panel-body">
                <!-- Filter Dropdowns -->
                <div class="row">
                    <div class="col-md-4">
                        <label for="student-filter">Filter by Course:</label>
                        <select id="student-filter" class="form-control">
                            <option value="">All Students</option>
                            <!-- Add options dynamically based on your students data -->
                            
                        </select>
                    </div>

                    </div>
                    <div class="col-md-4">
                        <label for="month-filter">Filter by Section:</label>
                        <select id="month-filter" class="form-control">
                            <option value="">All Months</option>
                            <!-- Add options for months dynamically if needed -->
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <!-- Add other months as needed -->
                        </select>
                    </div>
                </div>

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
