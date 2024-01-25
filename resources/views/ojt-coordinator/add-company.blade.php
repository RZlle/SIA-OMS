@extends('layout.ojt-coordinator-master')
@section('title', 'OJT Coordinator | Company Management')

@section('content-header')

    <h1 class="pull-left">Company Management - Add Company<small>Welcome OJT Coordinator!</small></h1>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Company Management</a></li>
            <li class="active">Add Company</li>
        </ol>
    </div>

@endsection

@section('main-content')

    <style>
        .error {
            color: red;
        }
    </style>

    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Company Details</h3>
            </div>
            <div class="panel-body form">
                <form id="add-company-table" class="form-horizontal form-separated" action="{{ route('createCompany') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">Company Name</label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="companyName" id="companyName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">Company Address</label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="address" id="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" col-md-3 control-label">Memorandum of Agreement</label>
                            <div class="col-md-4">
                                <div data-provides="fileinput" class="fileinput fileinput-new">
                                    <div class="input-group">
                                        <div data-trigger="fileinput" class="form-control">
                                            <i class="icon-doc fileinput-exists"></i>&nbsp;<span
                                                class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-success btn-file"><span
                                                class="fileinput-new">Select file </span><span
                                                class="fileinput-exists">Change </span><input name="moaFile"
                                                type="file"/></span><a href="#"
                                            data-dismiss="fileinput"
                                            class="input-group-addon btn btn-danger fileinput-exists">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">Validity Period</label>
                            <div class="col-md-4">
                                <input type="number" name="validityPeriod" id="validityPeriod" class="form-control">
                            </div>
                        </div>
                        <h4 class="pbm masm border-bottom"><strong class="text-uppercase text-info">Contact Person
                                Details</strong></h4>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Name</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="companyContact" id="companyContact">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Email Address</label>
                            <div class="col-md-4">
                                <input type="email" class="form-control" name="contactEmail"
                                    id="contactEmail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Contact Number</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="contactNumber"
                                    id="contactNumber">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    @endsection

    @section('scripts')

        <script>
            $(document).ready(function() {

                $('#add-company-table').validate({
                    rules: {
                        companyName: {
                            required: true
                        },
                        address: {
                            required: true
                        },
                        validityPeriod: {
                            number: true,
                            min: 1
                        },
                        companyContact: {
                            required: true
                        },
                        contactEmail: {
                            required: true,
                            email: true
                        },
                        contactNumber: {
                            required: true
                        }
                    },
                    messages: {
                        companyName: {
                            required: 'Company Name is required'
                        },
                        address: {
                            required: 'Company Address is required'
                        },
                        validityPeriod: {
                            min: 'Validity period must not be a negative number',
                            number: 'Must be a number',
                        },
                        companyContact: {
                            required: 'Name is required'
                        },
                        contactEmail: {
                            required: 'Email is required',
                            email: 'Must be a valid email'
                        },
                        contactNumber: {
                            required: 'Contact Number is required',
                        }
                    }
                });


                $('#add-btn').click(function() {

                    if ($('#add-company-table').valid()) {

                        $.ajax({
                            type: 'POST',
                            url: '{{ route('createCompany') }}',
                            data: $('#add-company-table').serialize(),
                            success: function(response) {
                                console.log('1');
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });

                    } else {
                        console.log('aw')
                    }
                });

            });
        </script>

    @endsection
