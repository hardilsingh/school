@extends('layouts.admin')


@section('heading')
Streams
@stop

@section('css-plugins')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop

@section('content')



<div class="form-three widget-shadow" style="margin-bottom:20px;">


    {!! Form::open([

    'action'=>'StreamController@store',
    'method'=>'POST',
    'class'=>'form-horizontal'

    ]) !!}



    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-3">
                <div class="form-group"> <label>Stream</label> <input required name="name" type="text" class="form-control" placeholder="Enter name"> </div>
            </div>
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
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($streams as $stream)

                <tr>
                    <td>{{$stream->id}}</td>
                    <td>{{$stream->name}}</td>
                    <td style="display:flex;">
                        {!! Form::model($stream , [
                        'action'=>['StreamController@destroy' , $stream->id],
                        'method'=>'DELETE'

                        ]) !!}
                        {!! Form::submit('Delete' , ['class'=>'btn btn-danger btn-md']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('streams.edit' , $stream->id)}}" style="margin-left:10px;" class="btn btn-md btn-warning">Edit</a>
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