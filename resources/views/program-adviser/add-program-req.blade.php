@extends('layout.program-adviser-master')
@section('title', 'Program Adviser | Requirements Management')

@section('content-header')

    <h1 class="pull-left">Requirements Management<small>Welcome Program Adviser!</small></h1>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Requirements Management</li>
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
                <h3 class="panel-title">Requirement Details</h3>
            </div>
            <div class="panel-body form">
                <form id="add-company-table" class="form-horizontal form-separated" action="{{ route('add-program-req') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">Requirement Name</label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="reqName" id="companyName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">Requirement Description</label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Deadline</label>
                            <div class="col-md-4">
                            <input name="dateSubmitted" id="datetimepicker_datepicker2" type="text"
                                        class="form-control" autocomplete="off" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" col-md-3 control-label">Requirement File</label>
                            <div class="col-md-4">
                                <div data-provides="fileinput" class="fileinput fileinput-new">
                                    <div class="input-group">
                                        <div data-trigger="fileinput" class="form-control">
                                            <i class="icon-doc fileinput-exists"></i>&nbsp;<span
                                                class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-success btn-file"><span
                                                class="fileinput-new">Select file </span><span
                                                class="fileinput-exists">Change </span><input name="reqFile"
                                                type="file"/></span><a href="#"
                                            data-dismiss="fileinput"
                                            class="input-group-addon btn btn-danger fileinput-exists">Remove</a>
                                    </div>
                                </div>
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
