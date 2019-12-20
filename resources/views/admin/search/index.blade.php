@extends('layouts.admin')
@section('heading')
Search By Station
@stop

@section('content')


<div class="row">
    <div class="col-lg-12">
        <label for="">Select Class:</label>
        {!! Form::select('stations' , $stations , 0 , ['class'=>'form-control' , 'placeholder'=>'Select a station below' , 'id'=>'station'])
        !!}
    </div>
</div>


<!-- Large modal -->
<button type="button" id="tmodal" style="display: none" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
    Search Results
</button>

<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="width:min-content">
            <div class="modal-header">
                <h4 class="modal-title">Search Results</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" style="padding:20px;" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Adm No.</th>
                            <th scope="col">Father Name</th>
                            <th scope="col">Mother Name</th>
                            <th scope="col">Class</th>
                            <th scope="col">Section</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Gender</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Small modal -->


@stop

@section('script-plugins')

<script>
    $(document).ready(function() {

        function getNumberWithOrdinal(n) {
            var s = ["th", "st", "nd", "rd"],
                v = n % 100;
            return n + (s[(v - 20) % 10] || s[v] || s[0]);
        }

        var id;
        // Department Change
        $('#station').change(function() {

            var id = $(this).val();
            $("#myTable").find("tr:not(:first)").remove();


            $.ajax({
                url: '/stationSearchnow?station_id=' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {


                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {


                        $(document).ready(function() {
                            $("#tmodal").trigger('click');
                        });

                        var j = 1
                        // Read data and create <option >
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
                            var adm_no = response['data'][i].adm_no;
                            var tel = response['data'][i].tel1;
                            var father = response['data'][i].father;
                            var mother = response['data'][i].mother;
                            var grade = response['data'][i].class;
                            var section = response['data'][i].section;
                            var gender = response['data'][i].gender;

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
                            var cell7 = row.insertCell(6);
                            var cell8 = row.insertCell(7);
                            var cell9 = row.insertCell(8);
                            var cell10 = row.insertCell(9);



                            // Add some text to the new cells:
                            cell1.innerHTML = j++;
                            cell2.innerHTML = name;
                            cell3.innerHTML = adm_no;
                            cell4.innerHTML = father;
                            cell5.innerHTML = mother;
                            cell6.innerHTML = grade == 100 ? 'Pre-Nursery 1' : getNumberWithOrdinal(grade);
                            cell7.innerHTML = section;
                            cell8.innerHTML = tel;
                            cell9.innerHTML = gender == 0 ? 'Male' : 'Female';
                            cell10.innerHTML = "<a href='students/" + id + "' class='btn btn-success'>View</a>";



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