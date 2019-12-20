@extends('layouts.admin')

@section('heading')
View Student
@stop

@section('content')


<style>
    .heading {
        font-size: 20px;
        width: 100px;
        margin-bottom: 18px;
        font-weight: bolder;
    }

    .particular {
        font-size: 18px;
        color: green;
        font-weight: bolder;
        margin-left: 10px;
        text-transform: uppercase;

    }
</style>

<div class="row" style="margin-bottom:50px;" class="text-center">
    <div class="col-lg-12">
        <h2><u>Students Profile</u><span style="margin-left: 20px;" class="{{$student->status == 1 ? 'badge badge-success' : 'badge badge-danger'}}">{{$student->status == 1 ? 'Active' : 'Deactivated'}}</span></h2>
    </div>
</div>




<div class="row">



    <div class="col-lg-3">
        @if($student->path == 0)
        <img src="/images/person.png" height="200px" width="200px" style="border-radius:50%; object-fit:cover" alt="">
        @endif

        @if($student->path !== 0)
        <img src="/images/{{$student->path}}" height="200px" width="200px" style="border-radius:50%; object-fit:cover" alt="">
        @endif
    </div>




    <div class="col-lg-3">
        <div class="row">
            <span class="heading">Name:</span>
            <span class="particular">{{$student->name}}</span>
        </div>
        <div class="row">
            <span class="heading">Class:</span>
            <span class="particular">{{$student->grade->class}}</span>
        </div>
        <div class="row">
            <span class="heading">Section:</span>
            <span class="particular">{{$student->section}}</span>
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
            <span class="particular">{{$student->stream}}</span>
        </div>

    </div>

    <div class="col-lg-3">
        <div class="row">
            <span class="heading">Father Name:</span>
            <span class="particular">{{$student->father}}</span>
        </div>
        <div class="row">
            <span class="heading">Mother Name:</span>
            <span class="particular">{{$student->mother}}</span>
        </div>
        <div class="row">
            <span class="heading">Telephone 1:</span>
            <span class="particular">{{$student->tel1}}</span>
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
            <span class="particular">{{$student->station !== 0 ? $student->stationName->name : 'N/A'}}</span>
        </div>
        <div class="row">
            <span class="heading">Blood Group:</span>
            <span class="particular">{{$student->blood_group}}</span>
        </div>
        <div class="row">
            <span class="heading">Caste-Category:</span>
            <span class="particular">{{$student->casteName->name}}</span>
        </div>
        <div class="row">
            <span class="heading">Religion:</span>
            <span class="particular">{{$student->religionName->name}}</span>
        </div>

    </div>


</div>



<div class="row" style="margin-top:50px;">
    <div class="col-lg-12 text-center">
        @if($student->status == 0)
        <a href="/activateStudent?student_id={{$student->id}}" class="btn btn-success"> <i class="fas fa-snowboarding"></i> Activate Student</a>
        @endif
        @if($student->status == 1)
        <a href="/deactivateStudent?student_id={{$student->id}}" class="btn btn-danger"> <i class="fa fa-plus-circle"></i> Deactivate Student</a>
        @endif
        <a href="/birth-certificates/create?student_id={{$student->id}}" style="margin-left:20px;" class="btn btn-primary"> <i class="fa fa-plus-circle"></i> Issue Birth Certificate</a>
        <a href="#" class="btn btn-danger" style="margin-left:20px;"><i class="fa fa-plus-circle"></i> Issue Transfer Cerificate</a>
        <a href="/character-certificates/create?student_id={{$student->id}}" class="btn btn-primary" style="margin-left:20px;"><i class="fa fa-plus-circle"></i> Issue Character Certificate</a>
        <a href="/gate-passes/create?student_id={{$student->id}}" class="btn btn-warning" style="margin-left:20px;"> <i class="fa fa-plus-circle"></i> Issue Gate Pass</a>
        <a href="{{route('students.edit' , $student->id)}}" class="btn btn-primary" style="margin-left:20px;"> <i class="fa fa-plus-circle"></i> Edit </a>
    </div>
</div>

@stop