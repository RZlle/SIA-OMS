@extends('layout.student-master')
@section('title', 'Student | Dashboard')

@section('content-header')
    <h1 class="pull-left">Dashboard<small>Welcome Student!</small></h1>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong class="text-uppercase text-success">Calendar</strong></h3>
                </div>
                <div class="panel-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel widget-tasks fluid">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong class="text-uppercase text-primary">UPCOMING TASKS</strong></h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped mbn">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Description</th>
                                <th>Deadline</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Submit Notarized Parent's Consent</td>
                                <td>Bring accomplished notarized parent's consent to Maam Cruz</td>
                                <td>December 12, 2023</td>
                            </tr>
                            <tr>
                                <td>Submit MOA</td>
                                <td>Give photocopy of MOA to Maam Monzon</td>
                                <td>December 17, 2023</td>
                            </tr>
                            <tr>
                                <td>Attend Seminar</td>
                                <td>Attend OJT Seminar for OJT Day 1</td>
                                <td>December 10, 2023</td>
                            </tr>
                            <tr>
                                <td>Complete Preliminary Requirements</td>
                                <td>Submit all preliminary requirements to Course Adviser</td>
                                <td>December 19, 2023</td>
                            </tr>
                            <tr>
                                <td>Submit Letter of Intent</td>
                                <td>Accomplish and submit letter of intent to OJT Coordinator</td>
                                <td>December 19, 2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong class="text-uppercase text-danger">QUICK LINKS</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="note note-primary">
                        <a href="#">
                            <h4><strong>Syllabus</strong></h4>
                            <p>The PUPQC Syllabus is an important document that fosters growth and excellence to every
                                iskolar ng bayan.</p>
                        </a>
                    </div>
                    <div class="note note-warning">
                        <a href="">
                            <h4><strong>Laws</strong></h4>
                            <p>Laws that PUPQC adheres to deliver quality education.</p>
                        </a>
                    </div>
                    <div class="note note-danger">
                        <a href="">
                            <h4><strong>Downloadable Documents</strong></h4>
                            <p>PUPQC Downloadable Documents</p>
                        </a>
                    </div>
                    <div class="note note-success">
                        <a href="">
                            <h4><strong>Important Links</strong></h4>
                            <p>Important links related to PUPQC OJT Process</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
