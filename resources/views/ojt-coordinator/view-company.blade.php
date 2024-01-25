@extends('layout.ojt-coordinator-master')
@section('title', 'OJT Coordinator | Company Management')

@section('content-header')

    <h1 class="pull-left">Company Management - View Company<small>Welcome OJT Coordinator!</small></h1>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Company Management</a></li>
            <li class="active">View Company</li>
        </ol>
    </div>

@endsection

@section('main-content')

    <div class="col-md-6">

        <div class="masm">
            <a href="{{ route('ojt-coordinator-companies') }}" id="back-btn"><i class="fa fa-arrow-left fa-lg"></i> <span><strong>Back</strong></span></a>
        </div>

        <div class="panel panel-info">

            <div class="panel-heading">

                <h3 class="panel-title">View Company</h3>

            </div>

            <div class="panel-body form">

                <form class="form-horizontal" action="">

                    <div class="form-body">

                        <h4 class="pbm border-bottom"><strong class="text-uppercase text-info">Company Information</strong></h4>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label class="control-label col-md-3" for="">Company Name: </label>

                                    <div class="col-md-9">

                                        <p class="form-control-static">{{ $specificCompany->companyName }}</p>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label class="control-label col-md-3" for="">MOA Validity: </label>

                                    <div class="col-md-9">

                                        <p class="form-control-static">{{ $specificCompany->validityPeriod }} years</p>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label class="control-label col-md-3" for="">Company Address: </label>

                                    <div class="col-md-9">

                                        <p class="form-control-static">{{ $specificCompany->address }}</p>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <h4 class="pbm border-bottom"><strong class="text-uppercase text-info">Contact Information</strong></h4>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label class="control-label col-md-3" for="">Contact Person: </label>

                                    <div class="col-md-9">

                                        <p class="form-control-static">{{ $specificCompany->companyContact }}</p>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label class="control-label col-md-3" for="">Contact No: </label>

                                    <div class="col-md-9">

                                        <p class="form-control-static">{{ $specificCompany->contactNumber }}</p>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label class="control-label col-md-3" for="">Email Address </label>

                                    <div class="col-md-9">

                                        <p class="form-control-static">{{ $specificCompany->contactEmail }}</p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <div class="col-md-6">
        <iframe height="800" width="800" src="" frameborder="0"></iframe>
    </div>

    {{-- /assets/{{ $task->taskFile }} --}}
@endsection

@section('scripts')

<script>

    $(document).ready(function () {



    });

</script>

@endsection
