@extends('layouts.admin')


@section('heading')
Reciepts
@stop


@section('content')

<div class="row">
    <div class="col-lg-12">
        <table id="myTable" class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Class & Section</th>
                    <th>Father Name</th>
                    <th>Recieved Amount</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($reciepts as $reciept)

                <tr>
                    <td>{{$reciept->id}}</td>
                    <td>{{$reciept->getStudent->name}}</td>
                    <td>{{$reciept->getStudent->class == 100 ? 'Pre-Nursery 1' : $reciept->getStudent->class}}-{{$reciept->getStudent->section}}</td>
                    <td>{{$reciept->getStudent->father}}</td>
                    <td>₹ {{$reciept->paid}}</td>
                    <td style="display:flex;">
                        <a href="{{route('reciepts.show' , $reciept->id)}}" style="margin-left:10px;" class="btn btn-md btn-warning">Show</a>
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