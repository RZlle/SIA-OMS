@extends('layout.ojt-coordinator-master')
@section('title', 'OJT Coordinator | Company Management')

@section('content-header')

    <h1 class="pull-left">Company Management - Edit Company<small>Welcome OJT Coordinator!</small></h1>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Company Management</a></li>
            <li class="active">Edit Company</li>
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
        <div class="masm">
            <a href="{{ route('ojt-coordinator-companies') }}" id="back-btn"><i class="fa fa-arrow-left fa-lg"></i>
                <span><strong>Back</strong></span></a>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Company Details</h3>
            </div>
            <div class="panel-body form">
                <form id="edit-company-table" class="form-horizontal form-separated" action="">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">Company Name</label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="company-name" id="company-name"
                                    value="{{ $specificCompany->companyName }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">Company Address</label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="company-address" id="company-address"
                                    value="{{ $specificCompany->address }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" col-md-3 control-label">Memorandum of Agreement</label>
                            <div class="col-md-4">
                                <div data-provides="fileinput" class="fileinput fileinput-new">
                                    <div class="input-group">
                                        <div data-trigger="fileinput" class="form-control">
                                            <i class="icon-doc fileinput-exists"></i>&nbsp;<span
                                                class="fileinput-filename"  id=""></span>
                                        </div>
                                        <span class="input-group-addon btn btn-success btn-file"><span
                                                class="fileinput-new">Select file</span><span
                                                class="fileinput-exists">Change</span><input type="file"
                                                name="..." /></span><a href="#" data-dismiss="fileinput"
                                            class="input-group-addon btn btn-danger fileinput-exists">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">Validity Period</label>
                            <div class="col-md-4">
                                <input type="number" name="validity-period" id="validity-period" class="form-control"
                                    value="{{ $specificCompany->validityPeriod }}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Contact Person Details</h3>
            </div>
            <div class="panel-body form">
                <form class="form-horizontal form-separated" action="">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Name</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="contact-person-name"
                                    id="contact-person-name" value="{{ $specificCompany->companyContact }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Email Address</label>
                            <div class="col-md-4">
                                <input type="email" class="form-control" name="contact-person-email"
                                    id="contact-person-email" value="{{ $specificCompany->contactEmail }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Contact Number</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="contact-person-contact-number"
                                    id="contact-person-contact-number" value="{{ $specificCompany->contactNumber }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-4">
                                <button id="submit-btn" type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <script>
        $(document).ready(function() {

            $('#edit-company-table').validate({
                    rules: {
                        companyName: {
                            required: true
                        },
                        companyAddress: {
                            required: true
                        },
                        moaFile: {
                            required: true
                        },
                        validityPeriod: {
                            required: true,
                            number: true,
                            min: 1
                        },
                        contactPersonName: {
                            required: true
                        },
                        contactPersonEmail: {
                            required: true,
                            email: true
                        },
                        contactPersonNumber: {
                            required: true
                        }
                    },
                    messages: {
                        companyName: {
                            required: 'Company Name is required'
                        },
                        companyAddress: {
                            required: 'Company Address is required'
                        },
                        moaFile: {
                            required: 'MOA is required'
                        },
                        validityPeriod: {
                            required: 'Validity period is required',
                            number: 'Must be a number',
                            min: 'Validity period must be atleast 1 year'

                        },
                        contactPersonName: {
                            required: 'Name is required'
                        },
                        contactPersonEmail: {
                            required: 'Email is required',
                            email: 'Must be a valid email'
                        },
                        contactPersonNumber: {
                            required: 'Contact Number is required',
                        }
                    }
                });

                $('#submit-btn').click(function () {

                    if($('#edit-company-table').valid())
                    {
                        axios.post('http://sms-oms.test/api/edit/company', {

                        });
                    }

                });

        });
    </script>

@endsection
