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
        <h2><u>Create Section</u></h2>
    </div>
</div>


<div class="form-three widget-shadow">


    {!! Form::open([

    'action'=>'SectionController@store',
    'method'=>'POST',
    'class'=>'form-horizontal'

    ]) !!}



    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-3">
                <div class="form-group"> <label>Section</label> <input name="name" type="text" class="form-control" placeholder="Enter name"> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label>Select Class</label> 
                {!! Form::select('grade_id' , $classes , 0 , ['class'=>'form-control' , 'placeholder'=>'Select class']) !!}
            </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label>Capacity</label> <input type="text" name="capacity" class="form-control" placeholder="Enter capacity"> </div>
            </div>
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
