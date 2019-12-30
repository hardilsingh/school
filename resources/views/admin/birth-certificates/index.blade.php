@extends('layouts.admin')

@section('css-plugins')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop

@section('content')


<div class="row" style="margin-bottom:30px;" class="text-center">
    <div class="col-lg-6">
        <h2><u>Birth Certificates</u></h2>
    </div>
</div>






<div class="col-lg-12">
    <div class="row">
        <table id="myTable" class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Admission Number</th>
                    <th>Name</th>
                    <th>Father name</th>
                    <th>Mother name</th>
                    <th>Class name</th>
                    <th>Issued On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($certificates as $certificate)
                <tr>
                    <td>{{$certificate->id}}</td>
                    <td>{{$certificate->adm_no}}</td>
                    <td>{{$certificate->name}}</td>
                    <td>{{$certificate->father_name}}</td>
                    <td>{{$certificate->mother_name}}</td>
                    <td>{{$certificate->class}}</td>
                    <td>{{$certificate->created_at->toDateString()}}</td>
                    <td style="display:flex;">
                        {!! Form::model($certificate , [

                        'action'=>['BcController@destroy' , $certificate->id],
                        'method'=>'DELETE'

                        ]) !!}
                        {!! Form::submit('Delete' , ['class'=>'btn btn-danger btn-md']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('birth-certificates.edit' , $certificate->id)}}" style="margin-left:10px;" class="btn btn-md btn-warning">Edit</a>
                        <a href="{{route('birth-certificates.show' , $certificate->id)}}" style="margin-left:10px;" target="_blank" class="btn btn-md btn-success">Show</a>
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