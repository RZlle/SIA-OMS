@extends('layout.student-master')
@section('title', 'Student | OJT Requirements')

@section('content-header')
    <h1 class="pull-left">OJT Requirements<small>Welcome to your OJT Requirements Page</small></h1>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">OJT Requirements</li>
        </ol>
    </div>
@endsection

@section('main-content')

<div class="row mbl">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><strong class="text-uppercase text-success">Preliminary Requirements</strong></h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead class="bg-default">
                        <tr>
                            <th>Requirement</th>
                            <th>Status</th>
                            <th>Date Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Parent's Consent</td>
                            <td><span class="label label-danger">Not Submitted</span></td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Notarized MOA</td>
                            <td><span class="label label-warning">For Review</span></td>
                            <td>November 30, 2023</td>
                        </tr>
                        <tr>
                            <td>Medical Clearance</td>
                            <td><span class="label label-success">Submitted</span></td>
                            <td>December 1, 2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row mbl">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><strong class="text-uppercase text-danger">Final Requirements</strong></h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead class="bg-default">
                        <tr>
                            <th>Requirement</th>
                            <th>Status</th>
                            <th>Date Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>OJT Hours</td>
                            <td><span class="label label-danger">Not Submitted</span></td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Portfolio</td>
                            <td><span class="label label-danger">Not Submitted</span></td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Evaluation</td>
                            <td><span class="label label-danger">Not Submitted</span></td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel black">
            <div class="panel-heading">
                <h3 class="panel-title"><strong class="text-uppercase">List of Requirements</strong></h3>
            </div>
            <div class="panel-body">
                <div class="row man">
                    <div class="col-lg-3">
                        <h3>Preliminary Requirements</h3>
                        <ul>
                            <li>Parent's Consent</li>
                            <li>Notarized MOA</li>
                            <li>Medical Clearance</li>
                            <li>Insurance</li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h3>Final Requirements</h3>
                        <ul>
                            <li><strong>OJT Requirements</strong></li>
                            <li><strong>Portfolio</strong>
                                <ul>
                                    <li>Dedication</li>
                                    <li>Acknowledgement</li>
                                    <li>Introduction</li>
                                    <li>Table of Contents</li>
                                </ul>
                            </li>
                            <li><strong>Course Description</strong>
                                <ul>
                                    <li>Course Objectives</li>
                                </ul>
                            </li>
                            <li><strong>History of PUP</strong>
                                <ul>
                                    <li>Vision</li>
                                    <li>Mission</li>
                                    <li>Philosophy</li>
                                    <li>Ten Pillars</li>
                                    <li>PUP Quezon City Campus History</li>
                                    <li>PUP Quezon City Campus Goals</li>
                                </ul>
                            </li>
                            <li><strong>About the Company</strong>
                                <ul>
                                    <li>Vision</li>
                                    <li>Mission</li>
                                    <li>Core Values</li>
                                    <li>Organizational Chart</li>
                                    <li>Product/Services</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <ul>
                            <li><strong>Office Training</strong>
                                <ul>
                                    <li>Training Objectives</li>
                                    <li>Notarize Memorandum of Agreement</li>
                                    <li>Received Copy of Endorsement Letter</li>
                                    <li>Non-Disclosure Agreement</li>
                                    <li>Training Orientation</li>
                                    <li>Duties and Responsibilities</li>
                                </ul>
                            </li>
                            <li><strong>About Trainee</strong>
                                <ul>
                                    <li><strong>Curriculum Vitae</strong>
                                        <ul>
                                            <li>Notarized Parent's Consent</li>
                                            <li>Internship Agreement</li>
                                            <li>Copy of Insurance Policy</li>
                                            <li>Daily Report of Task</li>
                                            <li>Accomplished Weekly Tasks Sheet</li>
                                            <li>Daily Time Record/Timecard</li>
                                            <li>Company Trainee ID</li>
                                            <li>Office Attire</li>
                                            <li>Photos in Action</li>
                                            <li>Certificate of Completion</li>
                                            <li>Accomplished Internship Adviser</li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><strong>Evaluation</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
