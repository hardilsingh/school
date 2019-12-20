@extends('layouts.admin')


@section('heading')
Edit Student
@stop

@section('content')


<style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>

<div class="tab">
    <button class="tablinks" id="basic" onclick="openCity(event, 'Basic Details')">Basic Details</button>
    <button class="tablinks" onclick="openCity(event, 'Contact Details')">Contact Details</button>
    <button class="tablinks" onclick="openCity(event, 'Mother')">Mother</button>
    <button class="tablinks" onclick="openCity(event, 'Father')">Father</button>
    <button class="tablinks" onclick="openCity(event, 'Convinience')">Convinience</button>
    <button class="tablinks" onclick="openCity(event, 'Documents')">Documents</button>
    <button class="tablinks" onclick="openCity(event, 'Other Details')">Other Details</button>
</div>


{!! Form::model($student , [

'action'=>['StudentsController@update' , $student->id],
'method'=>'PATCH',

]) !!}

<div id="Basic Details" class="tabcontent">

    <div class="row">

        <div class="col-lg-3">
            <div class="form-group"> <label for="exampleInputName2">Name:</label> <input value="{{$student->name}}" type="text" name="name" class="form-control" id="roll_number" placeholder="Enter Name"> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label for="exampleInputName2">Date Of Birth:</label> <input type="date" value="{{$student->dob}}" class="form-control" name="dob" id="exampleInputName2" placeholder="Your name"> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label for="exampleInputName2">Roll No.</label> <input type="text" name="roll_number" class="form-control" value="{{$student->roll_number}}" id="roll_number" placeholder="Roll No." readonly> </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group"> <label for="exampleInputName2">Adm No.</label> <input type="text" class="form-control" name="adm_no" value="{{$student->adm_no}}" id="exampleInputName2" placeholder="Adm No" readonly> </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="form-group"> <label for="exampleInputName2">Previous Adm. No: </label><input type="text" value="{{$student->previous_ad_number}}" name="previous_ad_number" class="form-control" id="exampleInputName2" placeholder="Previous Adm No."> </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group"> <label for="exampleInputName2">Date Of Adm: </label> <input type="date" name="admission_date" readonly value="{{$student->admission_date}}" class="form-control" id="exampleInputName2" placeholder="Your name"> </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group"> <label for="exampleInputName2">Session</label> <input type="text" class="form-control" name="session" value="{{$student->session}}" id="exampleInputName2" placeholder="" readonly> </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group"> <label for="exampleInputName2">Adm Type:</label>
                <select name="adm_type" id="" class="form-control">
                    @if($student->adm_type == 0)
                    <option value="0" selected>New Adm</option>
                    <option value="1">Re Adm</option>
                    @endif

                    @if($student->adm_type == 1)
                    <option value="0">New Adm</option>
                    <option value="1" selected>Re Adm</option>
                    @endif
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="form-group"> <label for="exampleInputName2">Class:</label>
                {!! Form::select('class' , $classes , $student->class , ['class'=>'form-control' , 'placeholder'=>'Select class' , 'id'=>'select_class']) !!}
            </div>
        </div>



        <div class="col-lg-3">
            <div class="form-group"> <label for="exampleInputName2">Section:</label>
                <select name="section" id="select_section" class="form-control">
                    <option value="{{$student->section}}" selected>{{$student->section}}</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group"> <label for="exampleInputName2">Stream</label>
                {!! Form::select('stream' , $streams , $student->stream , ['class'=>'form-control' , 'placeholder'=>'Select Streams']) !!}
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group"> <label for="exampleInputName2">Gender:</label>
                <select name="gender" id="" class="form-control">
                    <option value="{{$student->gender}}">{{$student->gender == 0 ? 'Male' : 'Female'}}</option>
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                </select>
            </div>
        </div>

    </div>



</div>



<div id="Contact Details" class="tabcontent">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group"> <label for="exampleInputName2">Contact No. 1: </label> <input type="tel" value="{{$student->tel1}}" class="form-control" name="tel1" id="exampleInputName2" placeholder="Telephone"> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label for="exampleInputName2">Aadhar UID: </label> <input type="text" value="{{$student->addhar_number}}" class="form-control" name="addhar_number" id="exampleInputName2" placeholder="Aadhar UID"> </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group"> <label for="exampleInputName2">Address: </label>
                <textarea class="form-control" name="address" id="" placeholder="Enter full address" cols="10" rows="4">{{$student->address}}</textarea>
            </div>
        </div>

    </div>
</div>



<div id="Mother" class="tabcontent">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group"> <label for="exampleInputName2">Mother Name:</label> <input type="text" class="form-control" name="mother" id="exampleInputName2" value="{{$student->mother}}" placeholder="Mother Name"> </div>
        </div>
    </div>
</div>

<div id="Father" class="tabcontent">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group"> <label for="exampleInputName2">Father Name:</label> <input type="text" class="form-control" name="father" id="exampleInputName2" value="{{$student->father}}" placeholder="Father Name"> </div>
        </div>
    </div>
</div>

<div id="Documents" class="tabcontent">


    <div class="form-group">
        <label for="">Documents:<span class="badge badge-danger"></span></label>

        DOB Certificate<input value="1" name="DOB_certificate" {{$student->DOB_certificate == 1 ? 'checked' : false}} type="checkbox" style="margin-right: 10px; margin-left:10px">

        School Leaving Certificate<input value="1" name="slc" {{$student->slc == 1 ? 'checked' : false}} type="checkbox" style="margin-right: 10px; margin-left:10px">

        Report Card<input value="1" name="report_card" {{$student->report_card == 1 ? 'checked' : false}} type="checkbox" style="margin-right: 10px; margin-left:10px">

        Aadhar Card<input value="1" name="aadhar_card" {{$student->aadhar_card == 1 ? 'checked' : false}} type="checkbox" style="margin-right: 10px; margin-left:10px">

        Transfer Certificate<input value="1" name="tc" {{$student->tc == 1 ? 'checked' : false}} type="checkbox" style="margin-right: 10px; margin-left:10px">

    </div>







    <div class="form-group">

        <label for="">Documents verified? <span class="badge badge-danger"></span></label>
        <div style="display: flex">
            Verified<input value="1" id="verified" {{$student->document_verified == 1 ? 'checked' : false}} name="document_verified" type="radio" style="margin-right: 10px; margin-left:10px">
            Not Verified<input value="0" id="verified" {{$student->document_verified == 0 ? 'checked' : false}} name="document_verified" type="radio" style="margin-right: 10px; margin-left:10px">
        </div>

    </div>

</div>


</div>

<div id="Convinience" class="tabcontent">
    <div class="form-group">
        <label for="">Convinience required?</label>
        <div style="display: flex">
            YES<input value="1" id="req" {{$student->convinience_req == 1 ? 'checked' : false}} name="convinience_req" type="radio"  style="margin-right: 10px; margin-left:10px">
            NO<input value="0" id="nreq" {{$student->convinience_req == 0 ? 'checked' : false}} name="convinience_req" type="radio"  style="margin-right: 10px; margin-left:10px">
        </div>

    </div>


    @if($student->convinience_req == 1)

    <div style="margin-top:20px;" id="stations" class="form-group"> <label for="exampleInputName2">Stations:
        {!! Form::select('station' , $stations , $student->station , ['class'=>'form-control' , 'placeholder'=>'Select Station']) !!}
    </div>

    @endif

    <div style="margin-top:20px; display:none" id="stations" class="form-group"> <label for="exampleInputName2">Stations:
        {!! Form::select('station' , $stations , $student->station, ['class'=>'form-control' , 'placeholder'=>'Select Station']) !!}
    </div>

    @if($student->convinience_req == 0)
    <div style="margin-top:20px;" id="other_con" class="form-group"> <label for="exampleInputName2">Other Convinience:
        {!! Form::select('other_con' , $other , $student->other_con , ['class'=>'form-control' , 'placeholder'=>'Select Other convinience']) !!}
    </div>
    @endif

    <div style="margin-top:20px; display:none;" id="other_con" class="form-group"> <label for="exampleInputName2">Other Convinience:
        {!! Form::select('other_con' , $other , $student->other_con , ['class'=>'form-control' , 'placeholder'=>'Select Other convinience']) !!}
    </div>
</div>

<div id="Other Details" class="tabcontent">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group"> <label for="exampleInputName2">Parents Annual Income:</label> <input value="{{$student->annual_income}}" type="number" name="annual_income" class="form-control" id="exampleInputName2" placeholder="Enter Income"> </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group"> <label for="exampleInputName2">Caste Category: </label>
                {!! Form::select('cast_category' , $castes , $student->cast_category , ['class'=>'form-control' , 'placeholder'=>'Select caste ']) !!}
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group"> <label for="exampleInputName2">Religion: </label>
                {!! Form::select('religion' , $religions , $student->religion , ['class'=>'form-control' , 'placeholder'=>'Select religion']) !!}
            </div>
        </div>
    </div>
</div>

<div class="row" style="padding: 30px;">
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::submit('Update&rarr;' , ['class'=>'btn btn-lg btn-success']) !!}
        </div>
    </div>
</div>

{!! Form::close() !!}


@stop

@section('script-plugins')

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    $(document).ready(function() {
        $("#basic").trigger('click');
    });


    $(document).ready(function() {

        $('#req').change(function() {
            console.log("done")
            $('#stations').css('display', '')
            $('#other_con').hide()
        });

        $('#nreq').change(function() {
            $('#other_con').css('display', '')
            $('#stations').hide()

        });





    });
</script>




@stop