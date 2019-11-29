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
        <h2><u>Create Employee</u></h2>
    </div>
</div>


<div class="form-three widget-shadow">


    {!! Form::open([

    'action'=>'EmployeeController@store',
    'method'=>'POST',
    'class'=>'form-horizontal'

    ]) !!}



    <div class="row">
        <div class="col-lg-12">
            <div class="form-group"> <label>Employee name</label> <input type="text" class="form-control" placeholder="Enter name"> </div>

            <div class="form-group">
                <button class="btn btn-lg btn-success text-center" type="submit">Issue &rarr;</button>
            </div>

        </div>
    </div>




    {!! Form::close() !!}

</div>


@stop