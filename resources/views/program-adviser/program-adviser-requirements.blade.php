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

<form>
  <div class="form-group row">
    <div class="panel-heading">
        <div class="col-sm-2">Requirements</div>
    </div>
    <div class="panel-body">
        <div class="col-sm-10">
            @foreach  ($requirements as $req)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                {$req->reqName}
                </label>
            </div>
            @endforeach
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Assign Requirements</button>
            </div>
        </div>
    </div>
</form>

<div class= "row">
        <div class="panel">
        <div class="panel-heading">
            <a href="{{ route('add-program-req') }}" class="btn btn-primary max pull-right">Add
          Requirement</a>
        </div>
        <div class="panel-body">
            <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                <li><a href="#">Assigned</a></li>
                <li><a href="#">Missing</a></li>
                <li><a href="#">Done</a></li>
                </ul>
            </div>
            </nav>
        </div>
    </div>
</div>
@endsection