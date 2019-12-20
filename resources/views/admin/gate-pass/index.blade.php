@extends('layouts.admin')



@section('content')


<div class="row" style="margin-bottom:30px;" class="text-center">
    <div class="col-lg-6">
        <h2><u>Gate Passes</u></h2>
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

<div class="row">
    <table id="myTable" class="table">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Class</th>
                <th>With Whom</th>
                <th>Issued On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($passes as $pass)
            <tr>
                <td>{{$pass->id}}</td>
                <td>{{$pass->name}}</td>
                <td>{{$pass->class}}</td>
                <td>{{$pass->with_whom}}</td>
                <td>{{$pass->created_at->toDateTimeString()}}</td>
                <td style="display:flex;">
                    {!! Form::model($pass , [

                    'action'=>['GatePassController@destroy' , $pass->id],
                    'method'=>'DELETE'

                    ]) !!}
                    {!! Form::submit('Delete' , ['class'=>'btn btn-danger btn-lg']) !!}
                    {!! Form::close() !!}
                    <a href="{{route('gate-passes.edit' , $pass->id)}}" style="margin-left:10px;" class="btn btn-lg btn-warning">Edit</a>
                    <a href="{{route('gate-passes.show' , $pass->id)}}" style="margin-left:10px;" class="btn btn-lg btn-success">Show</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>




@stop

