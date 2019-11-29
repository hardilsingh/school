@extends('layouts.admin')

@section('css-plugins')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop

@section('content')


<div class="row" style="margin-bottom:100px;" class="text-center">
    <div class="col-lg-6" >
        <h2><u>Employee</u></h2>
    </div>
    <div class="col-lg-6">
        <a href="#" class="btn btn-success"><i style="color:white" class="glyphicon glyphicon-export"></i> Export Excel</a>
        <a href="#" class="btn btn-primary" style="margin-left:20px;"><i class="fa fa-search"></i> Search</a>
        <a href="{{route('employee.create')}}" class="btn btn-warning" style="margin-left:20px;"><i class="fa fa-plus-circle"></i> Add new</a>

    </div>
</div>


<div class="col-lg-12">
    <div class="row">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
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