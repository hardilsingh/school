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
        <h2><u>Edit Concession</u></h2>
    </div>
</div>


<div class="form-three widget-shadow">


    {!! Form::model($concession , [

    'action'=>['ConcessionController@update' , $concession->id],
    'method'=>'PATCH',
    'class'=>'form-horizontal'

    ]) !!}



    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-3">
                <div class="form-group"> <label>Name</label> <input name="name" type="text" class="form-control" placeholder="Enter name" value="{{$concession->name}}" required> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label>Monthly Fee <span class="badge badge-success">(in %)</span> </label> <input name="monthly" type="text" value="{{$concession->monthly}}" required class="form-control" placeholder="Enter Concession "> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label>Computer Fee <span class="badge badge-success">(in %)</span> </label> <input name="computer" type="text" value="{{$concession->computer}}" required class="form-control" placeholder="Enter Concession "> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label>Transport Fee <span class="badge badge-success">(in %)</span> </label> <input name="transport" type="text" value="{{$concession->transport}}" required class="form-control" placeholder="Enter Concession "> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label>Id card Fee <span class="badge badge-success">(in %)</span> </label> <input name="id_card" type="text" value="{{$concession->id_card}}" required class="form-control" placeholder="Enter Concession "> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label>Examination Fee <span class="badge badge-success">(in %)</span> </label> <input name="examination" required value="{{$concession->examination}}" type="text" class="form-control" placeholder="Enter Concession "> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label>Stationary Fee <span class="badge badge-success">(in %)</span> </label> <input name="stationary" value="{{$concession->stationary}}" required type="text" class="form-control" placeholder="Enter Concession "> </div>
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