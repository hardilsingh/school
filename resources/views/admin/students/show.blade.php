@extends('layouts.admin')

@section('content')


<style>
    .heading {
        font-size: 20px;
    }

    .particular {
        font-size: 18px;
        color: green;
        font-weight: bolder;
        margin-left: 10px;
        text-transform: uppercase;

    }
</style>

<div class="row" style="margin-bottom:100px;" class="text-center">
    <div class="col-lg-4">
        <h2><u>Students Profile</u></h2>
    </div>
</div>



<div class="col-lg-12" style="margin-bottom:50px;">

    <div class="col-lg-3">
        <img src="/photos/{{$student->path}}" height="200px" width="200px" style="border-radius:50%; object-fit:cover" alt="">
    </div>

    <div class="col-lg-3">
        <div class="row">
            <span class="heading">Name:</span>
            <span class="particular">{{$student->name}}</span>
        </div>
        <div class="row">
            <span class="heading">Class:</span>
            <span class="particular">{{$class->class}}</span>
        </div>
        <div class="row">
            <span class="heading">Section:</span>
            <span class="particular">{{$section->name}}</span>
        </div>
        <div class="row">
            <span class="heading">Adm No:</span>
            <span class="particular">{{$student->adm_no}}</span>
        </div>
        <div class="row">
            <span class="heading">Gender:</span>
            <span class="particular">{{$student->gender == 0 ? 'Male' : 'Female'}}</span>
        </div>
        <div class="row">
            <span class="heading">Stream:</span>
            <span class="particular">{{$stream->name}}</span>
        </div>

    </div>

    <div class="col-lg-3">
        <div class="row">
            <span class="heading">Father Name:</span>
            <span class="particular">{{$father->name}}</span>
        </div>
        <div class="row">
            <span class="heading">Mother Name:</span>
            <span class="particular">{{$mother->name}}</span>
        </div>
        <div class="row">
            <span class="heading">Telephone 1:</span>
            <span class="particular">{{$student->tel1}}</span>
        </div>
        <div class="row">
            <span class="heading">Telephone 2:</span>
            <span class="particular">{{$student->tel2}}</span>
        </div>
        <div class="row">
            <span class="heading">Address:</span>
            <span class="particular">{{$student->address}}</span>
        </div>

    </div>

    <div class="col-lg-3">
        <div class="row">
            <span class="heading">Convinience Required:</span>
            <span class="particular">{{$student->convinience_req == 1 ? 'Yes' : 'No'}}</span>
        </div>
        <div class="row">
            <span class="heading">Station</span>
            <span class="particular">{{$station->name}}</span>
        </div>
        <div class="row">
            <span class="heading">Blood Group:</span>
            <span class="particular">{{$student->blood_group}}</span>
        </div>
        <div class="row">
            <span class="heading">Caste-Category:</span>
            <span class="particular">{{$caste->name}}</span>
        </div>
        <div class="row">
            <span class="heading">Religion:</span>
            <span class="particular">{{$religion->name}}</span>
        </div>

    </div>

</div>

<div class="row">
    <div class="col-lg-12 text-center">
        <a href="/birth-certificates/create?student_id={{$student->id}}" class="btn btn-primary"> <i class="fa fa-plus-circle"></i> Issue Birth Certificate</a>
        <a href="#" class="btn btn-danger" style="margin-left:20px;"><i class="fa fa-plus-circle"></i> Issue Transfer Cerificate</a>
        <a href="/character-certificates/create?student_id={{$student->id}}" class="btn btn-primary" style="margin-left:20px;"><i class="fa fa-plus-circle"></i> Issue Character Certificate</a>
        <a href="/gate-passes/create?student_id={{$student->id}}" class="btn btn-warning" style="margin-left:20px;"> <i class="fa fa-plus-circle"></i> Issue Gate Pass</a>
        <a href="{{route('students.edit' , $student->id)}}" class="btn btn-primary" style="margin-left:20px;"> <i class="fa fa-plus-circle"></i> Edit </a>
    </div>
</div>

@stop