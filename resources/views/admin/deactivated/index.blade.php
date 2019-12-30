@extends('layouts.admin')


@section('css-plugins')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop

@section('heading')
Deactivated Students
@stop

@section('title')
Deactivated Students
@stop
@section('content')




<div class="row">
    <div class="col-lg-12">
        <table class="table" id="myTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Adm No.</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Father Name</th>
                    <th scope="col">Mother Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Section</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Documents Verified</th>
                    <th scope="col">Gender</th>
                    <th scope="col">View</th>

                </tr>
            </thead>
            <tbody>

                @php
                $i = 1
                @endphp

                @foreach($results as $result)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$result->name}}</td>
                    <td>{{$result->adm_no}}</td>
                    <td>{{$result->dob}}</td>
                    <td>{{$result->father}}</td>
                    <td>{{$result->mother}}</td>
                    <td>{{$result->class == 100 ? 'Pre Primary-1' : $result->class}}</td>
                    <td>{{$result->section}}</td>
                    <td>{{$result->tel1}}</td>
                    <td>{{$result->document_verified == 1 ? 'Verified' : 'Not Verfied'}}</td>
                    <td>{{$result->gender == 0 ? 'Male' : 'Female'}}</td>
                    <td>
                        <a href='students/{{$result->id}}' class='btn btn-success'>View</a>
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