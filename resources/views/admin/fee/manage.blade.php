@extends('layouts.admin')
@section('content')


<div class="row">
    <div class="col-lg-12 text-center">
        <div class="col-lg-12" style="position:relative; left:50%; transform:translateX(-50%); margin-top:30px;">
            <table class="table table-bordered thead-dark">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Admission Number</th>
                        <th scope="col">Class</th>
                        <th scope="col">Section</th>
                        <th scope="col">Father Name</th>
                        <th scope="col">Mother Name</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Date Of admission</th>
                        <th scope="col">Apply Concession</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$student->name}}</td>
                        <td>{{$student->adm_no}}</td>
                        <td>{{$student->grade->class}}</td>
                        <td>{{$student->section}}</td>
                        <td>{{$student->father}}</td>
                        <td>{{$student->mother}}</td>
                        <td>{{$student->tel1}}, {{$student->tel2 == 0 ? 'N/A' : $student->tel2}}</td>
                        <td>{{$student->admission_date}}</td>
                        <td>
                            {!! Form::select('concession' , $concession , $fee->concession , ['class'=>'form-control' , 'id'=>'concessionTotal' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>






@stop