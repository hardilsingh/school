@extends('layouts.admin')




@section('content')


<style>
    .col-lg-4 {
        padding: 0 40px;
    }

    .col-lg-3 {
        padding: 0 40px;
    }

    .col-lg-6 {
        padding: 0 40px;
        margin-bottom: 30px;
    }
</style>


<div class="row" style="margin-bottom:80px;" class="text-center">
    <div class="col-lg-6">
        <h2><u>Edit Student Information</u></h2>
    </div>
</div>


<div class="form-three widget-shadow">


    {!! Form::model($student , [

    'action'=>['StudentsController@update' , $student->id],
    'method'=>'PATCH',
    'class'=>'form-horizontal',
    'enctype'=>'multipart/form-data'

    ]) !!}


    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Previous Adm. No</label> <input type="text" name="prev_adm_no" value="{{$student->previous_ad_number}}" class="form-control" id="exampleInputName2" placeholder="Previous Adm No." autofocus autocapitalize=""> </div>
            </div>


            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Date Of Adm</label> <input type="date" name="date_of_adm" value="{{$student->admission_date}}" class="form-control" id="exampleInputName2" placeholder="Your name"> </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Session</label> <input type="text" class="form-control" name="session" value="{{now()->year}}-{{now()->year+1}}" id="exampleInputName2" placeholder="" readonly> </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Class</label>
                    {!! Form::select('grade_id' , $classes , $student->class , ['class'=>'form-control' , 'placeholder'=>'Select class' , 'id'=>'select_class']) !!}
                </div>

            </div>


            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Section</label>
                    <select name="section_id" id="select_section" class="form-control">
                        @foreach($sections as $section)
                            <option selected value="{{$section->id}}">{{$section->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Stream (Select N/A if not selected)</label>
                    {!! Form::select('stream_id' , $streams , $student->stream , ['class'=>'form-control' , 'placeholder'=>'Select Streams']) !!}
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Roll No.</label> <input type="text" name="roll_number" class="form-control" value="{{$roll_number->roll_number}}" id="roll_number" placeholder="Roll No." readonly> </div>
            </div>


            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Adm No.</label> <input type="text" class="form-control" name="adm_no" value="{{$adm_number->adm_no}}" id="exampleInputName2" placeholder="Adm No" readonly> </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Photo</label> <input type="file" class="form-control" name="photo"  id="exampleInputName2" placeholder=""> </div>
            </div>
        </div>
    </div>


    <hr class="hr">


    <div class="row">
        <div class="col-lg-12">

            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Adm Type</label>
                    <select name="adm_type" id="" class="form-control">
                        @if($student->adm_type == 0)
                        <option value="0" selected>New Adm</option>
                        <option value="1">Re Adm</option>

                        @endif
                        @if($student->adm_type == 1)
                        <option value="1" selected>Re Adm</option>
                        <option value="0">New Adm</option>

                        @endif
                    </select>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Name</label> <input type="text" name="name" class="form-control" value="{{$student->name}}" id="roll_number" placeholder="Enter Name"> </div>
            </div>


            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Gender</label>
                    <select name="gender" id="" class="form-control">
                        @if($student->gender == 0)
                        <option value="0" selected>Male</option>
                        <option value="1">Female</option>

                        @endif
                        @if($student->gender == 1)
                        <option value="1">Female</option>
                        <option value="0">Male</option>

                        @endif
                    </select>
                </div>

            </div>
        </div>


        <hr class="hr">

        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-4">

                    <label for="">Documents (Check if submitted)</label>

                    @if($student->DOB_certificate == 1)
                    <div class="checkbox-inline1"><label><input checked value="1" name="DOB_cer" type="checkbox">DOB Certificate</label></div>
                    @endif
                    @if($student->DOB_certificate == 0)
                    <div class="checkbox-inline1"><label><input value="1" name="dob_cer" type="checkbox">DOB Certificate</label></div>
                    @endif

                    @if($student->slc == 1)
                    <div class="checkbox-inline1"><label><input checked value="1" name="slc" type="checkbox">School Leaving Certificate</label></div>
                    @endif
                    @if($student->slc == 0)
                    <div class="checkbox-inline1"><label><input value="1" name="slc" type="checkbox">School Leaving Certificate</label></div>
                    @endif

                    @if($student->report_card == 1)
                    <div class="checkbox-inline1"><label><input value="1" checked name="rc" type="checkbox">Report Card</label>
                    </div>
                    @endif

                    @if($student->report_card == 0)
                    <div class="checkbox-inline1"><label><input value="1"  name="rc" type="checkbox">Report Card</label>
                    </div>
                    @endif

                    @if($student->addhar_card == 1)
                    <div class="checkbox-inline1"><label><input checked value="1" name="ac" type="checkbox">Aadhar Card</label>
                    </div>
                    @endif
                    @if($student->addhar_card == 0)
                    <div class="checkbox-inline1"><label><input  value="1" name="ac" type="checkbox">Aadhar Card</label>
                    </div>
                    @endif
                    @if($student->tc == 1)
                    <div class="checkbox-inline1"><label><input checked value="1" name="tc" type="checkbox">Transfer Certificate</label>
                    </div>
                    @endif
                    @if($student->tc == 0)
                    <div class="checkbox-inline1"><label><input  value="1" name="tc" type="checkbox">Transfer Certificate</label>
                    </div>
                    @endif

                </div>

                <div class="col-lg-4">

                    <label for="">Documents verified?</label>
                    @if($student->document_verified == 1)
                    <div class="checkbox-inline1"><label><input checked value="1" id="verified" name="verified" type="radio">Verified</label></div>
                    <div class="checkbox-inline1"><label><input value="0" id="verified" name="verified" type="radio">Not Verified</label></div>
                    @endif
                    @if($student->document_verified == 0)
                    <div class="checkbox-inline1"><label><input value="1" id="verified" name="verified" type="radio">Verified</label></div>
                    <div class="checkbox-inline1"><label><input checked value="0" id="verified" name="verified" type="radio">Not Verified</label>

                    </div>
                    @endif

                </div>

                <div class="col-lg-4">

                    <div class="form-group"> <label for="exampleInputName2">Date Of Birth</label> <input type="date" class="form-control" value="{{$student->dob}}" name="DOB" id="exampleInputName2" placeholder="Your name"> </div>
                </div>

            </div>

        </div>


        <hr class="hr">

        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-3">
                    <div class="form-group"> <label for="exampleInputName2">Father Name</label> <input type="text" class="form-control" value="{{$father->name}}" name="father_name" id="exampleInputName2" placeholder="Father Name"> </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group"> <label for="exampleInputName2">Father Occupation</label> <input type="text" class="form-control" value="{{$father->occupation}}" name="father_occup" id="exampleInputName2" placeholder="Occupation Name"> </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group"> <label for="exampleInputName2">Father UID</label> <input type="text" class="form-control" value="{{$father->UID}}" name="father_uid" id="exampleInputName2" placeholder="Father UID"> </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group"> <label for="exampleInputName2">Father Qualification</label> <input type="text" class="form-control" value="{{$father->qual}}" name="father_qual" id="exampleInputName2" placeholder="Father Qualification"> </div>
                </div>



            </div>

        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-3">
                    <div class="form-group"> <label for="exampleInputName2">Mother Name</label> <input type="text" class="form-control" value="{{$mother->name}}" name="mother_name" id="exampleInputName2" placeholder="Mother Name"> </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group"> <label for="exampleInputName2">Mother Occupation</label> <input type="text" class="form-control" value="{{$mother->occupation}}" name="mother_occup" id="exampleInputName2" placeholder="Occupation Name"> </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group"> <label for="exampleInputName2">Mother UID</label> <input type="text" class="form-control" name="mother_uid" value="{{$mother->UID}}" id="exampleInputName2" placeholder="Mother UID"> </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group"> <label for="exampleInputName2">Mother Qualification</label> <input type="text" class="form-control" value="{{$mother->qual}}" name="mother_qual" id="exampleInputName2" placeholder="Mother Qualification"> </div>
                </div>



            </div>

        </div>

        <hr class="hr">


        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-3">
                    <div class="form-group"> <label for="exampleInputName2">Contact No. 1</label> <input type="tel" class="form-control" value="{{$student->tel1}}" name="tel1" id="exampleInputName2" placeholder="Telephone"> </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group"> <label for="exampleInputName2">Contact No. 2</label> <input type="tel" class="form-control" value="{{$student->tel2}}" name="tel2" id="exampleInputName2" placeholder="Telephone"> </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group"> <label for="exampleInputName2">Aadhar UID</label> <input type="text" class="form-control" value="{{$student->addhar_number}}" name="UID" id="exampleInputName2" placeholder="Aadhar UID"> </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group"> <label for="exampleInputName2">Address</label>
                        <textarea class="form-control" name="address" id="" placeholder="Enter full address" cols="10" rows="4">{{$student->address}}</textarea>
                    </div>
                </div>



            </div>

        </div>


        <hr class="hr">



        <div class="row">
            <div class="col-lg-12">

                <div class="col-lg-4">

                    <label for="">Convinience required?</label>
                    @if($student->convinience_req == 1)
                    <div class="checkbox-inline1"><label><input checked value="1" name="required" type="radio">Yes</label></div>
                    <div class="checkbox-inline1"><label><input value="0" name="required" type="radio">No</label>
                    </div>
                    @endif
                    @if($student->convinience_req == 0)
                    <div class="checkbox-inline1"><label><input value="1" name="required" type="radio">Yes</label></div>
                    <div class="checkbox-inline1"><label><input checked value="0" name="required" type="radio">No</label>
                    </div>
                    @endif
                </div>


                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Stations</label>
                        {!! Form::select('station_id' , $stations , $student->station , ['class'=>'form-control' , 'placeholder'=>'Select Station']) !!}
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Parents Annual Income</label> <input type="number" name="income" value="{{$student->annual_income}}" class="form-control" id="exampleInputName2" placeholder="Enter Income"> </div>
                </div>

            </div>

        </div>


        <hr class="hr">


        <div class="row">
            <div class="col-lg-12">

                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Caste Category</label>
                        {!! Form::select('caste_id' , $castes , $student->cast_category , ['class'=>'form-control' , 'placeholder'=>'Select caste ']) !!}
                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Religion</label>
                        {!! Form::select('religion_id' , $religions , $student->religion , ['class'=>'form-control' , 'placeholder'=>'Select religion']) !!}
                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Blood Group</label> <input type="text" class="form-control" value="{{$student->blood_group}}" name="blood" id="exampleInputName2" placeholder="Enter Boold Group"> </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4">
                <button class="btn btn-lg btn-success" type="submit">Submit</button>
            </div>
        </div>


        {!! Form::close() !!}

    </div>


    @stop

    @section('script-plugins')

    <!-- Script to get sections -->
    <script type='text/javascript'>
        $(document).ready(function() {

            // Department Change
            $('#select_class').change(function() {

                // Department id
                var id = $(this).val();

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

        });
    </script>

    @stop