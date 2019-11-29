@extends('layouts.admin')




@section('content')


<style>
    .col-lg-4 {
        padding: 0 40px;
    }

    .col-lg-3 {
        padding: 0 40px;
    }
</style>


<div class="row" style="margin-bottom:80px;" class="text-center">
    <div class="col-lg-6">
        <h2><u>School Leaving Certificate</u></h2>
    </div>
</div>


<div class="form-three widget-shadow">


    {!! Form::open([

    'action'=>'TcController@create',
    'method'=>'POST',
    'class'=>'form-horizontal'

    ]) !!}


    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Adm. No</label> <input type="text" class="form-control" id="exampleInputName2" placeholder="Adm No." autofocus autocapitalize=""> </div>
            </div>


            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Sr No.</label> <input type="date" class="form-control" id="exampleInputName2" placeholder="Your name" readonly> </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Session</label> <input type="text" class="form-control" id="exampleInputName2" placeholder="" readonly> </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Class</label>
                    <select name="" class="form-control" id="">
                        <option value="">classes</option>
                    </select>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Section</label>
                    <select name="" class="form-control" id="">
                        <option value="">Sections</option>
                    </select>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Stream</label>
                    <select name="" class="form-control" id="">
                        <option value="">Streams</option>
                    </select>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Roll No.</label> <input type="text" class="form-control" id="exampleInputName2" placeholder="Roll No." readonly> </div>
            </div>


            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Adm No.</label> <input type="text" class="form-control" id="exampleInputName2" placeholder="Adm No" readonly> </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Photo</label> <input type="file" class="form-control" id="exampleInputName2" placeholder=""> </div>
            </div>
        </div>
    </div>


    <hr class="hr">

    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-4">

                <label for="">Documents (Check if submitted)</label>

                <div class="checkbox-inline1"><label><input type="checkbox">DOB Certificate</label>

                </div>
                <div class="checkbox-inline1"><label><input type="checkbox">School Leaving Certificate</label>

                </div>
                <div class="checkbox-inline1"><label><input type="checkbox">Report Card</label>

                </div>
                <div class="checkbox-inline1"><label><input type="checkbox">Aadhar Card</label>

                </div>
                <div class="checkbox-inline1"><label><input type="checkbox">Transfer Certificate</label>

                </div>

            </div>

            <div class="col-lg-4">

                <label for="">Documents verified?</label>

                <div class="checkbox-inline1"><label><input id="verified" name="verified" type="radio">Verified</label>
                    <div class="checkbox-inline1"><label><input id="verified" name="verified" type="radio">Not Verified</label>

                    </div>

                </div>
            </div>

            <div class="col-lg-4">

                <div class="form-group"> <label for="exampleInputName2">Date Of Birth</label> <input type="date" class="form-control" id="exampleInputName2" placeholder="Your name"> </div>
            </div>

        </div>

    </div>


    <hr class="hr">

    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-3">
                <div class="form-group"> <label for="exampleInputName2">Father Name</label> <input type="text" class="form-control" id="exampleInputName2" placeholder="Father Name"> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label for="exampleInputName2">Father Occupation</label> <input type="text" class="form-control" id="exampleInputName2" placeholder="Occupation Name"> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label for="exampleInputName2">Father UID</label> <input type="text" class="form-control" id="exampleInputName2" placeholder="Father UID"> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label for="exampleInputName2">Father Qualification</label> <input type="text" class="form-control" id="exampleInputName2" placeholder="Father Qualification"> </div>
            </div>



        </div>

    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-3">
                <div class="form-group"> <label for="exampleInputName2">Mother Name</label> <input type="text" class="form-control" id="exampleInputName2" placeholder="Mother Name"> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label for="exampleInputName2">Mother Occupation</label> <input type="text" class="form-control" id="exampleInputName2" placeholder="Occupation Name"> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label for="exampleInputName2">Mother UID</label> <input type="text" class="form-control" id="exampleInputName2" placeholder="Mother UID"> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label for="exampleInputName2">Mother Qualification</label> <input type="text" class="form-control" id="exampleInputName2" placeholder="Mother Qualification"> </div>
            </div>



        </div>

    </div>

    <hr class="hr">


    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-3">
                <div class="form-group"> <label for="exampleInputName2">Contact No. 1</label> <input type="tel" class="form-control" id="exampleInputName2" placeholder="Telephone"> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label for="exampleInputName2">Contact No. 2</label> <input type="tel" class="form-control" id="exampleInputName2" placeholder="Telephone"> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label for="exampleInputName2">Aadhar UID</label> <input type="text" class="form-control" id="exampleInputName2" placeholder="Aadhar UID"> </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group"> <label for="exampleInputName2">Address</label>
                    <textarea class="form-control" name="" id="" placeholder="Enter full address" cols="10" rows="4"></textarea>
                </div>
            </div>



        </div>

    </div>


    <hr class="hr">



    <div class="row">
        <div class="col-lg-12">

            <div class="col-lg-4">

                <label for="">Convinience required?</label>

                <div class="checkbox-inline1"><label><input name="required" type="radio">Yes</label>
                    <div class="checkbox-inline1"><label><input name="required" type="radio">No</label>

                    </div>

                </div>
            </div>


            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Stations</label>
                    <select name="" class="form-control" id="">
                        <option value="">Stations</option>
                    </select>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Parents Annual Income</label> <input type="number" class="form-control" id="exampleInputName2" placeholder="Enter Income"> </div>
            </div>

        </div>

    </div>


    <hr class="hr">


    <div class="row">
        <div class="col-lg-12">

            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Caste</label>
                    <select name="" class="form-control" id="">
                        <option value="">Select Caste</option>
                    </select>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Religion</label>
                    <select name="" class="form-control" id="">
                        <option value="">Select Religion</option>
                    </select>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Blood Group</label> <input type="text" class="form-control" id="exampleInputName2" placeholder="Enter Boold Group"> </div>
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