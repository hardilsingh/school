@extends('layouts.admin')

@section('css-plugins')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop

@section('content')


<div class="row" style="margin-bottom:100px;" class="text-center">
    <div class="col-lg-6">
        <h2><u>Transfer Certificates</u></h2>
    </div>
    <div class="col-lg-6">
        <a href="#" class="btn btn-success"><i style="color:white" class="glyphicon glyphicon-export"></i> Export Excel</a>
        <a href="#" class="btn btn-primary" style="margin-left:20px;"><i class="fa fa-search"></i> Search</a>
        <a href="{{route('transfer-certificates.create')}}" class="btn btn-warning" style="margin-left:20px;"><i class="fa fa-plus-circle"></i> Add new</a>

    </div>
</div>


@if(Session::has('deleted'))
<div class="row">
    <div class="col-lg-6">
        <p class="alert alert-success">{{ Session::get('deleted') }}</p>
    </div>
</div>
@endif

@if(Session::has('updated'))
<div class="row">
    <div class="col-lg-6">
        <p class="alert alert-success">{{ Session::get('updated') }}</p>
    </div>
</div>
@endif

@if(Session::has('created'))
<div class="row">
    <div class="col-lg-6">
        <p class="alert alert-success">{{ Session::get('created') }}</p>
    </div>
</div>
@endif


<div class="col-lg-12">
    <div class="row">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Admission Number</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Admission Date</th>
                    <th>Tel</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>




@stop

@section('script-plugins')
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@stop