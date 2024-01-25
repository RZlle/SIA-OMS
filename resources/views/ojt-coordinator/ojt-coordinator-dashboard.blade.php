@extends('layout.ojt-coordinator-master')
@section('title', 'OJT Coordinator | Dashboard')

@section('content-header')
    <h1 class="pull-left">Dashboard<small>Welcome OJT Coordinator!</small></h1>
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
            <div class="row">

                <div class="col-md-6">
                    <div class="panel panel-stat stat-primary">
                        <div class="panel-body">
                            <div class="row mbxl">
                                <div class="col-xs-8"><span class="stat-title">Partnered Companies</span>
                                    <h2 class="man">19</h2>
                                </div>
                                <div style="width: 100%;" class="col-xs-6 col-md-4"><i class="icon-globe"></i></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6"><span class="stat-title">New Companies</span>
                                    <h4 class="man">7</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-stat stat-success">
                        <div class="panel-body">
                            <div class="row mbxl">
                                <div class="col-xs-8"><span class="stat-title">OJT Students</span>
                                    <h2 class="man">1,200</h2>
                                </div>
                                <div style="width: 100%;" class="col-xs-6 col-md-4"><i class="icon-users"></i></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6"><span class="stat-title">Assigned Students</span>
                                    <h4 class="man">790</h4>
                                </div>
                                <div class="col-xs-6"><span class="stat-title">Awaiting Placement</span>
                                    <h4 class="man">410</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>TOTAL NUMBER OF STUDENTS</strong></h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-no-border mbn">
                                <thead>
                                    <th>Program</th>
                                    <th style="width:25%;">#</th>
                                    <th>Awaiting Placement</th>
                                    <th>Assigned</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>BSIT</td>
                                        <td>120</td>
                                        <td>60</td>
                                        <td>60</td>
                                    </tr>
                                    <tr>
                                        <td>BSENT</td>
                                        <td>120</td>
                                        <td>60</td>
                                        <td>60</td>
                                    </tr>
                                    <tr>
                                        <td>DOMT</td>
                                        <td>120</td>
                                        <td>60</td>
                                        <td>60</td>
                                    </tr>
                                    <tr>
                                        <td>BSBA - MM</td>
                                        <td>120</td>
                                        <td>60</td>
                                        <td>60</td>
                                    </tr>
                                    <tr>
                                        <td>BSBA - HRM</td>
                                        <td>120</td>
                                        <td>60</td>
                                        <td>60</td>
                                    </tr>
                                    <tr>
                                        <td>BTLED ICT</td>
                                        <td>120</td>
                                        <td>60</td>
                                        <td>60</td>
                                    </tr>
                                    <tr>
                                        <td>BTLED HE</td>
                                        <td>120</td>
                                        <td>60</td>
                                        <td>60</td>
                                    </tr>
                                    <tr>
                                        <td>BPA</td>
                                        <td>120</td>
                                        <td>60</td>
                                        <td>60</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>PARTNERED COMPANIES</strong></h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-no-border mbn">
                        <thead>
                            <th>Name of Company</th>
                            <th>Validity of MOA</th>
                            <th>Assigned Students</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ASUS</td>
                                <td>4 years and 11 months</td>
                                <td>326</td>
                            </tr>
                            <tr>
                                <td>Globe Telecom</td>
                                <td>5 years</td>
                                <td>14</td>
                            </tr>
                            <tr>
                                <td>ASUS</td>
                                <td>4 years and 11 months</td>
                                <td>326</td>
                            </tr>
                            <tr>
                                <td>ASUS</td>
                                <td>4 years and 11 months</td>
                                <td>326</td>
                            </tr>
                            <tr>
                                <td>ASUS</td>
                                <td>4 years and 11 months</td>
                                <td>326</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

<script>

    $(document).ready(function () {



    });

</script>

@endsection
