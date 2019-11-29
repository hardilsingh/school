@extends('layouts.admin')

@section('css-plugins')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@stop

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="">Enter Student Name or Telephone or Admission Number</label>
            <input type="text" name="" id="searchIndex" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-md btn-success" id="search">Search</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Select Class</label>
                {!! Form::select('class' , $classes , 0 , ['class'=>'form-control' , 'placeholder'=>'Select a class below' ,
                'id'=>'select_class'])
                !!}
            </div>

        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Select Section</label>
                <select name="" class="form-control" id="select_section">
                    <option value="" selected>Select a section below</option>
                </select>
            </div>

        </div>
    </div>
</div>

<div class="row" style="margin-top:40px;">
    <div class="col-lg-12">
        <table id="myTable" class="table">
            <thead class="thead-dark">
                <th>#</th>
                <th>Admission Number</th>
                <th>Name</th>
                <th>Telephone</th>
                <th>Action</th>
                <th>Fee manager</th>
            </thead>

            <tbody class="table-striped">

            </tbody>
        </table>
    </div>
</div>


@stop

@section('script-plugins')

<script>
    $(document).ready(function() {


        $("#search").click(function() {

            var keyword = document.getElementById('searchIndex').value
            document.getElementById

            $("#myTable").find("tr:not(:first)").remove();

            $.ajax({
                url: '/getStudents?keyword=' + keyword,
                type: 'get',
                dataType: 'json',
                success: function(response) {


                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        // Read data and create <option >
                        var j = 1;
                        for (var i = 0; i < len; i++) {

                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
                            var adm_no = response['data'][i].adm_no;
                            var tel = response['data'][i].tel1;

                            var table = document.getElementById("myTable");

                            // Create an empty <tr> element and add it to the 1st position of the table:
                            var row = table.insertRow(1);

                            // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            var cell6 = row.insertCell(5);

                            // Add some text to the new cells:
                            cell1.innerHTML = j++;
                            cell2.innerHTML = adm_no;
                            cell3.innerHTML = name;
                            cell4.innerHTML = tel;
                            cell5.innerHTML = "<a href='students/" + id + "/edit' class='btn btn-success'>View</a>";
                            cell6.innerHTML = "<a href='inventory/" + id + "/edit' class='btn btn-warning'>Fee Manager</a>";



                        }
                    } else {
                        alert("No Data Found")
                    }

                }
            });
        })



        var id;

        // Department Change
        $('#select_class').change(function() {

            // Department id
            id = $(this).val();

            // Empty the dropdown
            $('#select_section').find('option').not(':first').remove();

            // AJAX request 
            $.ajax({
                url: '/getSections/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {

                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        // Read data and create <option >
                        for (var i = 0; i < len; i++) {

                            var id = response['data'][i].id;
                            var name = response['data'][i].name;

                            var option = "<option value='" + id + "'>" + name + "</option>";

                            $("#select_section").append(option);
                        }
                    }

                }
            });
        });

        $('#select_section').change(function() {

            var section = $(this).val();

            $("#myTable").find("tr:not(:first)").remove();


            $.ajax({
                url: '/getStudents?grade=' + id + '&section=' + section,
                type: 'get',
                dataType: 'json',
                success: function(response) {


                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        // Read data and create <option >
                        var j = 1;
                        for (var i = 0; i < len; i++) {

                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
                            var adm_no = response['data'][i].adm_no;
                            var tel = response['data'][i].tel1;

                            var table = document.getElementById("myTable");

                            // Create an empty <tr> element and add it to the 1st position of the table:
                            var row = table.insertRow(1);

                            // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            var cell6 = row.insertCell(5);

                            // Add some text to the new cells:
                            cell1.innerHTML = j++;
                            cell2.innerHTML = adm_no;
                            cell3.innerHTML = name;
                            cell4.innerHTML = tel;
                            cell5.innerHTML = "<a href='students/"+id+"/edit' class='btn btn-success'>View</a>";
                            cell6.innerHTML = "<a href='students/"+id+"/edit' class='btn btn-warning'>Fee Manager</a>";



                        }
                    } else {
                        alert("No Data Found")
                    }

                }
            });
        })
    });
</script>

@stop