@extends('layouts.admin')


@section('content')





<div class="row" style="margin-bottom:30px;" class="text-center">
    <div class="col-lg-6">
        <h2><u>Grades</u>  <a href="{{route('classes.create')}}" class="btn btn-warning" style="margin-left:20px;"><i class="fa fa-plus-circle"></i> Add new</a></h2>
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
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Class</th>
                    <th>Monthly Fee</th>
                    <th>Computer Fee</th>
                    <th>Sports Fee</th>
                    <th>Stationary</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($classes as $class)
                <tr>
                    <td>{{$class->id}}</td>
                    <td>{{$class->class}}</td>
                    <td>₹{{$class->fee}}</td>
                    <td>₹{{$class->computer_fee}}</td>
                    <td>₹{{$class->sports}}</td>
                    <td>₹{{$class->stationary}}</td>
                    <td style="display:flex;">
                        {!! Form::model($class , [
                        'action'=>['GradeController@destroy' , $class->id],
                        'method'=>'DELETE'
                        ]) !!}
                        {!! Form::submit('Delete' , ['class'=>'btn btn-danger btn-lg']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('classes.edit' , $class->id)}}" style="margin-left:10px;" class="btn btn-lg btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




@stop