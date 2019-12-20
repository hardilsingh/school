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
        <h2><u>Add Class</u></h2>
    </div>
</div>


<div class="form-three widget-shadow">


    {!! Form::open([

    'action'=>'GradeController@store',
    'method'=>'POST',
    'class'=>'form-horizontal'

    ]) !!}



    <div class="row">
        <div class="col-lg-4">
            <div class="form-group"> <label>Grade</label> <input name="class" type="text" class="form-control" placeholder="Enter Grade"> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label>Enter Monthly Fee</label> <input name="fee" type="text" class="form-control" placeholder="Enter Monthly Fee "> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label>Enter Computer Fee</label> <input name="computer_fee" type="text" class="form-control" placeholder="Enter Computer Fee "> </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group"> <label>Sports Fee</label> <input value="0" name="sports" type="text" class="form-control" placeholder="Enter Fee"> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label>Stationary Fee</label> <input value="0" name="stationary" type="text" class="form-control" placeholder="Enter Fee"> </div>
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