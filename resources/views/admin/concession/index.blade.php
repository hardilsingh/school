@extends('layouts.admin')

@section('css-plugins')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop

@section('content')





<div class="row" style="margin-bottom:100px;" class="text-center">
    <div class="col-lg-6">
        <h2><u>Concessions</u></h2>
    </div>
    <div class="col-lg-6">
        <a href="{{route('concession.create')}}" class="btn btn-warning" style="margin-left:20px;"><i class="fa fa-plus-circle"></i> Add new</a>
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
                    <th>Name</th>
                    <th>Concession Of</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($concessions as $concession)
                <tr>
                    <td>{{$concession->id}}</td>
                    <td>{{$concession->name}}</td>
                    <td>{{$concession->concession}}%</td>
                    <td style="display:flex;">
                        {!! Form::model($concession , [
                        'action'=>['ConcessionController@destroy' , $concession->id],
                        'method'=>'DELETE'
                        ]) !!}
                        {!! Form::submit('Delete' , ['class'=>'btn btn-danger btn-lg']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('concession.edit' , $concession->id)}}" style="margin-left:10px;" class="btn btn-lg btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
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