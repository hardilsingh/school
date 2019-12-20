@extends('layouts.admin')


@section('content')


<div class="row" style="margin-bottom:30px;" class="text-center">
    <div class="col-lg-6" >
        <h2><u>Stations</u> <a href="{{route('stations.create')}}" class="btn btn-warning" style="margin-left:20px;"><i class="fa fa-plus-circle"></i> Add new</a></h2>
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
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Transport Fee</th>
                    <th>Bus Number</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($stations as $station)
                
                <tr>
                    <td>{{$station->id}}</td>
                    <td>{{$station->name}}</td>
                    <td>{{$station->fee}}</td>
                    <td>{{$station->bus}}</td>
                    <td style="display:flex;">
                        {!! Form::model($station , [
                        'action'=>['StationController@destroy' , $station->id],
                        'method'=>'DELETE'

                        ]) !!}
                        {!! Form::submit('Delete' , ['class'=>'btn btn-danger btn-lg']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('stations.edit' , $station->id)}}" style="margin-left:10px;" class="btn btn-lg btn-warning">Edit</a>
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