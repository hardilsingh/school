@extends('layouts.admin')

@section('css-plugins')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop

@section('content')


<div class="row" style="margin-bottom:100px;" class="text-center">
    <div class="col-lg-6">
        <h2><u>Transfer Certificates</u></h2>
    </div>
</div>





<div class="col-lg-12">
    <div class="row">
        <table id="myTable" class="display">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Admission Number</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Admission Date</th>
                    <th>Tel</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

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