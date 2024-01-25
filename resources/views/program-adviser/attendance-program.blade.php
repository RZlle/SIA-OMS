@extends('layout.program-adviser-master')
@section('title', 'Program Adviser | Attendance Management')

@section('content-header')
    <h1 class="pull-left">Attendance Management<small>Welcome Program Adviser!</small></h1>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Attendance Management</li>
        </ol>
    </div>
@endsection

@section('main-content')


<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <!-- Filter Dropdowns -->
                <div class="row">
                    <div class="col-md-4">
                        <label for="student-filter">Filter by Student:</label>
                        <select id="student-filter" class="form-control">
                            <option value="">All Students</option>
                            <!-- Add options dynamically based on your students data -->
                            
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="course-filter">Filter by Course:</label>
                        <select id="course-filter" class="form-control">
                            <option value="">All Courses</option>
                            <!-- Add options dynamically based on your courses data -->
                            
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="month-filter">Filter by Month:</label>
                        <select id="month-filter" class="form-control">
                            <option value="">All Months</option>
                            <!-- Add options for months dynamically if needed -->
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <!-- Add other months as needed -->
                        </select>
                    </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong class="text-uppercase text-success">Student Attendance</strong></h3>
                </div>
                <div class="panel-body">
                    <table id="datatables" class="table table-striped table-bordered">
                        <thead class="bg-default">
                            <tr>
                                <th style="width: 30%;">Student Name</th>
                                <th>Date </th>
                                <th>Time in</th>
                                <th>Time out</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance as $attend)
                                <tr row-id="">
                                    <td>{{ $attend->studentName }}</td>
                                    <td>
                                    {{ $attend->attendDate }} 
                                    </td>
                                    <td>
                                    {{ $attend->timeIn }}
                                    </td>
                                    <td>
                                    {{ $attend->timeOut }}
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
