@extends('layouts.admin')




@section('content')


<style>
    .col-lg-4 {
        padding: 0 40px;
    }

    .col-lg-3 {
        padding: 0 40px;
    }
</style>


<div class="row" style="margin-bottom:80px;" class="text-center">
    <div class="col-lg-6">
        <h2><u>Edit Station</u></h2>
    </div>
</div>


<div class="form-three widget-shadow">


    {!! Form::model($station , [

    'action'=>['StationController@update' , $station->id],
    'method'=>'PATCH',
    'class'=>'form-horizontal'

    ]) !!}



    <div class="row">

        <div class="col-lg-3">
            <div class="form-group"> <label>Station Name</label> <input required value="{{$station->name}}" name="name" type="text" class="form-control" placeholder="Enter name"> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Transport Fee</label> <input required value="{{$station->fee}}" name="fee" type="text" class="form-control" placeholder="Enter Transport Fee"> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Bus Number</label> <input value="{{$station->bus}}" name="bus" type="text" class="form-control" placeholder="Enter Bus number"> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Route</label> <input value="{{$station->route}}" name="route" type="text" class="form-control" placeholder="Enter Route"> </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-3">
            <button class="btn btn-lg btn-success" type="submit">Submit</button>
        </div>
    </div>



    {!! Form::close() !!}

</div>


@stop