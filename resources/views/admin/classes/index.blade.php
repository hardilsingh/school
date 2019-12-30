@extends('layouts.admin')


@section('heading')
Classes
@stop

@section('css-plugins')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop


@section('content')




<div class="form-three widget-shadow" style="margin-bottom:20px;">


    {!! Form::open([

    'action'=>'GradeController@store',
    'method'=>'POST',
    'class'=>'form-horizontal'

    ]) !!}



    <div class="row">
        <div class="col-lg-4">
            <div class="form-group"> <label>Grade</label> <input required name="class" type="text" class="form-control" placeholder="Enter Grade"> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label>Enter Monthly Fee</label> <input required name="fee" type="text" class="form-control" placeholder="Enter Monthly Fee "> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label>Enter Computer Fee</label> <input required name="computer_fee" type="text" class="form-control" placeholder="Enter Computer Fee "> </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group"> <label>Id Card</label> <input value="0" name="sports" type="text" class="form-control" placeholder="Enter Fee"> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label>Examination Fee</label> <input value="0" name="stationary" type="text" class="form-control" placeholder="Enter Fee"> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label>Stationary Fee</label> <input value="0" name="stationary_fee" type="text" class="form-control" placeholder="Enter Fee"> </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-3">
            <button class="btn btn-md btn-success" type="submit">Submit</button>
        </div>
    </div>



    {!! Form::close() !!}

</div>


<hr class="hr">




<div class="row">

    <div class="col-lg-12">
        <table id="myTable" class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Class</th>
                    <th>Monthly Fee</th>
                    <th>Computer Fee</th>
                    <th>Id Card Fee</th>
                    <th>Examination</th>
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
                    <td>₹{{$class->stationary_fee}}</td>
                    <td style="display:flex;">
                        {!! Form::model($class , [
                        'action'=>['GradeController@destroy' , $class->id],
                        'method'=>'DELETE'
                        ]) !!}
                        {!! Form::submit('Delete' , ['class'=>'btn btn-danger btn-md']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('classes.edit' , $class->id)}}" style="margin-left:10px;" class="btn btn-md btn-warning">Edit</a>
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