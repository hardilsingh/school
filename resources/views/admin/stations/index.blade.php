@extends('layouts.admin')


@section('heading')
Stations
@stop


@section('content')


<div class="row" style="margin-bottom: 20px;">
    <div class="col-lg-12">
        <div class="form-three widget-shadow">


            {!! Form::open([

            'action'=>'StationController@store',
            'method'=>'POST',
            'class'=>'form-horizontal'

            ]) !!}

            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group"> <label>Station Name</label> <input required name="name" type="text" class="form-control" placeholder="Enter name"> </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group"> <label>Transport Fee</label> <input required name="fee" type="text" class="form-control" placeholder="Enter Transport Fee"> </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group"> <label>Bus Number</label> <input name="bus" type="text" class="form-control" placeholder="Enter Bus Numner"> </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group"> <label>Route</label> <input name="route" type="text" class="form-control" placeholder="Enter Route"> </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="padding: 20px;">
        <div class="col-lg-3">
            <button class="btn btn-md btn-success" type="submit">Submit</button>
        </div>
    </div>

</div>





{!! Form::close() !!}

</div>


<hr class="hr">
<div class="row">
    <div class="col-lg-12">
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Transport Fee</th>
                    <th>Bus Number</th>
                    <th>Route</th>
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
                    <td>{{$station->route}}</td>
                    <td style="display:flex;">
                        {!! Form::model($station , [
                        'action'=>['StationController@destroy' , $station->id],
                        'method'=>'DELETE'

                        ]) !!}
                        {!! Form::submit('Delete' , ['class'=>'btn btn-danger btn-md']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('stations.edit' , $station->id)}}" style="margin-left:10px;" class="btn btn-md btn-warning">Edit</a>
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