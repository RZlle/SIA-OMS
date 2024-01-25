@extends('layout.ojt-coordinator-master')
@section('title', 'OJT Coordinator | Company Management')

@section('content-header')

    <h1 class="pull-left">Company Management<small>Welcome OJT Coordinator!</small></h1>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Company Management</li>
        </ol>
    </div>

@endsection


@section('main-content')

    <div class="row">


        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <a href="{{ route('ojt-coordinator-add-company') }}" class="btn btn-primary max pull-right">Add
                        Company</a>
                </div>
                <div class="panel-body">
                    <table id="company-table" class="table table-striped table-bordered">
                        <thead>
                            <th>Company Name</th>
                            <th>MOA Status</th>
                            <th>Contact Person</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr row-id="{{ $company->companyId }}">
                                    <td>{{ $company->companyName }}</td>
                                    <td> <span class="label label-success label-rounded">{{ $company->validityPeriod }}
                                            years</span> </td>
                                    <td>{{ $company->companyContact }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" data-toggle="dropdown"
                                                class="btn btn-default dropdown-toggle">
                                                Actions &nbsp;<span class="caret"></span>
                                            </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a id="view-btn">View</a></li>
                                                <li><a id="edit-btn">Edit</a></li>
                                                <li><a id="del-btn" href="#">Delete</a></li>
                                            </ul>
                                        </div>
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


@section('scripts')

    <script>
        $(document).ready(function() {

            $('#company-table').dataTable({
                "dom": '<"pull-left"f><t><i><p>'
            });

            $('#company-table').on('click', "#view-btn", function(e) {
                let id = $(this).closest('tr').attr('row-id');
                console.log(id);
                window.open('/ojt-coordinator/companies/view/' + id, "_self");
            });

            $('#company-table').on('click', "#edit-btn", function(e) {
                let id = $(this).closest('tr').attr('row-id');
                console.log(id);
                window.open('/ojt-coordinator/companies/edit/' + id, "_self");
            });

        });
    </script>

@endsection
