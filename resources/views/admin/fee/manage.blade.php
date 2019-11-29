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
                        <td>{{$section->name}}</td>
                        <td>{{$father->name}}</td>
                        <td>{{$student->tel1}}, {{$student->tel2 == 0 ? 'N/A' : $student->tel2}}</td>
                        <td>{{$student->created_at->toDateString()}}</td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-lg-12 text-center">
        @if($fee->q1 == 0)
        <div class="col-lg-3">
            <button class="btn btn-danger btn-lg" id="q1">Quater 1 <span class="text-bold">Fee pending</span></button>
        </div>
        @endif
        @if($fee->q1 == 1)
        <div class="col-lg-3">
            <button class="btn btn-success btn-lg" disabled>Quater 1 <span class="text-bold">Fee Paid</span></button>
        </div>
        @endif
        @if($fee->q2 == 0)
        <div class="col-lg-3">
            <button class="btn btn-danger btn-lg" id="q2">Quater 2 <span class="text-bold">Fee pending</span></button>
        </div>
        @endif
        @if($fee->q2 == 1)
        <div class="col-lg-3">
            <button class="btn btn-success btn-lg" disabled >Quater 2 <span class="text-bold">Fee Paid</span></button>
        </div>
        @endif
        @if($fee->q3 == 0)
        <div class="col-lg-3">
            <button class="btn btn-danger btn-lg" id="q3">Quater 3 <span class="text-bold">Fee pending</span></button>
        </div>
        @endif
        @if($fee->q3 == 1)
        <div class="col-lg-3">
            <button class="btn btn-success btn-lg" disabled >Quater 3 <span class="text-bold">Fee Paid</span></button>
        </div>
        @endif
        @if($fee->q4 == 0)
        <div class="col-lg-3">
            <button class="btn btn-danger btn-lg" id="q4">Quater 4 <span class="text-bold">Fee pending</span></button>
        </div>
        @endif
        @if($fee->q4 == 1)
        <div class="col-lg-3">
            <button class="btn btn-success btn-lg" disabled>Quater 4 <span class="text-bold">Fee Paid</span></button>
        </div>
        @endif

    </div>
</div>

<div class="row" id="quater1">
    <div class="col-lg-12 text-center">
        <div class="col-lg-10" style="position:relative; left:50%; transform:translateX(-50%); margin-top:30px;">
            <table class="table table-bordered thead-dark">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Item Name</th>
                        <th scope="col">Apply Concession</th>
                        <th scope="col">Amount to be paid</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3"><button id="save" class="btn btn-md btn-primary">Save &rarr;</button></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td id="total"></td>
                    </tr>
                    <tr>
                        <td>April Fee 2019-Monthly Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession1' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->fee}}" id="fee1" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>May Fee 2019-Monthly Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession2' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->fee}}" id="fee2" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>June Fee 2019-Monthly Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession3' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->fee}}" id="fee3" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>April Fee 2019-Computer Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession4' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->computer_fee}}" id="fee4" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>May Fee 2019-Computer Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession5' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->computer_fee}}" id="fee5" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>June Fee 2019-Computer Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession6' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->computer_fee}}" id="fee6" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>Transport Fee April ({{$station !== null ? $station->name : 'N/A'}}) </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession7' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$station !== null ? $station->fee : '0'}}" id="fee7" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>Transport Fee May ({{$station !== null ? $station->name : 'N/A'}}) </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession8' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$station !== null ? $station->fee : '0'}}" id="fee8" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>Transport Fee June ({{$station !== null ? $station->name : 'N/A'}}) </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession9' , 'placeholder'=>'Select concession type']) !!}
                        </td>

                        <td>
                            <input type="number" name="" value="{{$station !== null ? $station->fee : '0'}}" id="fee9" class="form-control">

                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td id="total1"></td>
                    </tr>
                    <tr>
                        <td colspan="3"><button id="save" class="btn btn-md btn-primary">Save &rarr;</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="row" id="quater2">
    <div class="col-lg-12 text-center">
        <div class="col-lg-10" style="position:relative; left:50%; transform:translateX(-50%); margin-top:30px;">
            <table class="table table-bordered thead-dark">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Item Name</th>
                        <th scope="col">Apply Concession</th>
                        <th scope="col">Amount to be paid</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3"><button id="save" class="btn btn-md btn-primary">Save &rarr;</button></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td id="total"></td>
                    </tr>
                    <tr>
                        <td>July Fee 2019-Monthly Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession1' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->fee}}" id="fee1" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>August Fee 2019-Monthly Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession2' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->fee}}" id="fee2" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>September Fee 2019-Monthly Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession3' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->fee}}" id="fee3" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>July Fee 2019-Computer Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession4' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->computer_fee}}" id="fee4" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>August Fee 2019-Computer Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession5' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->computer_fee}}" id="fee5" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>September Fee 2019-Computer Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession6' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->computer_fee}}" id="fee6" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>Transport Fee July ({{$station !== null ? $station->name : 'N/A'}}) </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession7' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$station !== null ? $station->fee : '0'}}" id="fee7" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>Transport Fee August ({{$station !== null ? $station->name : 'N/A'}}) </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession8' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$station !== null ? $station->fee : '0'}}" id="fee8" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>Transport Fee September ({{$station !== null ? $station->name : 'N/A'}}) </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession9' , 'placeholder'=>'Select concession type']) !!}
                        </td>

                        <td>
                            <input type="number" name="" value="{{$station !== null ? $station->fee : '0'}}" id="fee9" class="form-control">

                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td id="total1"></td>
                    </tr>
                    <tr>
                        <td colspan="3"><button id="save" class="btn btn-md btn-primary">Save &rarr;</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="row" id="quater3">
    <div class="col-lg-12 text-center">
        <div class="col-lg-10" style="position:relative; left:50%; transform:translateX(-50%); margin-top:30px;">
            <table class="table table-bordered thead-dark">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Item Name</th>
                        <th scope="col">Apply Concession</th>
                        <th scope="col">Amount to be paid</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3"><button id="save" class="btn btn-md btn-primary">Save &rarr;</button></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td id="total"></td>
                    </tr>
                    <tr>
                        <td>October Fee 2019-Monthly Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession1' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->fee}}" id="fee1" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>November Fee 2019-Monthly Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession2' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->fee}}" id="fee2" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>December Fee 2019-Monthly Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession3' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->fee}}" id="fee3" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>October Fee 2019-Computer Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession4' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->computer_fee}}" id="fee4" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>November Fee 2019-Computer Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession5' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->computer_fee}}" id="fee5" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>December Fee 2019-Computer Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession6' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->computer_fee}}" id="fee6" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>Transport Fee October ({{$station !== null ? $station->name : 'N/A'}}) </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession7' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$station !== null ? $station->fee : '0'}}" id="fee7" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>Transport Fee November ({{$station !== null ? $station->name : 'N/A'}}) </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession8' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$station !== null ? $station->fee : '0'}}" id="fee8" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>Transport Fee December ({{$station !== null ? $station->name : 'N/A'}}) </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession9' , 'placeholder'=>'Select concession type']) !!}
                        </td>

                        <td>
                            <input type="number" name="" value="{{$station !== null ? $station->fee : '0'}}" id="fee9" class="form-control">

                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td id="total1"></td>
                    </tr>
                    <tr>
                        <td colspan="3"><button id="save" class="btn btn-md btn-primary">Save &rarr;</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
<div class="row" id="quater4">
    <div class="col-lg-12 text-center">
        <div class="col-lg-10" style="position:relative; left:50%; transform:translateX(-50%); margin-top:30px;">
            <table class="table table-bordered thead-dark">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Item Name</th>
                        <th scope="col">Apply Concession</th>
                        <th scope="col">Amount to be paid</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3"><button id="save" class="btn btn-md btn-primary">Save &rarr;</button></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td id="total"></td>
                    </tr>
                    <tr>
                        <td>January Fee 2019-Monthly Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession1' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->fee}}" id="fee1" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>February Fee 2019-Monthly Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession2' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->fee}}" id="fee2" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>March Fee 2019-Monthly Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession3' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->fee}}" id="fee3" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>January Fee 2019-Computer Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession4' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->computer_fee}}" id="fee4" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>February Fee 2019-Computer Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession5' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->computer_fee}}" id="fee5" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>March Fee 2019-Computer Fee </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession6' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$student->grade->computer_fee}}" id="fee6" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>Transport Fee January ({{$station !== null ? $station->name : 'N/A'}}) </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession7' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$station !== null ? $station->fee : '0'}}" id="fee7" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>Transport Fee February ({{$station !== null ? $station->name : 'N/A'}}) </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession8' , 'placeholder'=>'Select concession type']) !!}
                        </td>
                        <td>
                            <input type="number" name="" value="{{$station !== null ? $station->fee : '0'}}" id="fee8" class="form-control">

                        </td>
                    </tr>
                    <tr>
                        <td>Transport Fee March ({{$station !== null ? $station->name : 'N/A'}}) </td>
                        <td>
                            {!! Form::select('concession' , $concession , 0 , ['class'=>'form-control' , 'id'=>'concession9' , 'placeholder'=>'Select concession type']) !!}
                        </td>

                        <td>
                            <input type="number" name="" value="{{$station !== null ? $station->fee : '0'}}" id="fee9" class="form-control">

                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td id="total1"></td>
                    </tr>
                    <tr>
                        <td colspan="3"><button id="save" class="btn btn-md btn-primary">Save &rarr;</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>





@stop

@section('script-plugins')

<script>


    $('#quater1').hide();
    $('#quater2').hide();
    $('#quater3').hide();
    $('#quater4').hide();


    $("#q1").click(function() {
        $('#quater3').hide();
        $('#quater4').hide();
        $('#quater2').hide();
        $('#quater1').show();
    })
    $("#q2").click(function() {
        $('#quater3').hide();
        $('#quater4').hide();
        $('#quater1').hide();
        $('#quater2').show();
    })
    $("#q3").click(function() {
        $('#quater1').hide();
        $('#quater4').hide();
        $('#quater2').hide();
        $('#quater3').show();
    })
    $("#q4").click(function() {
        $('#quater3').hide();
        $('#quater1').hide();
        $('#quater2').hide();
        $('#quater4').show();
    })

    total();

    function total() {
        const array = [];
        for (var i = 1; i < 10; i++) {
            var value = document.getElementById('fee' + i).value;
            var intValue = parseInt(value);
            array.push(intValue);
        }
        var sum = array.reduce(function(a, b) {
            return a + b;
        }, 0);

        document.getElementById('total').innerHTML = sum;
        document.getElementById('total1').innerHTML = sum;

        return sum;
    }

    function calculateConcession(concession, fee) {
        var newfee = (concession / 100) * fee;
        return calculatedFee = fee - newfee;
    }


    $("#concession1").change(function() {
        var concession = $(this).val();
        var fee = $('#fee1').val()
        var newFee = calculateConcession(concession, fee)
        document.getElementById("fee1").value = newFee;
        total();
    })

    $("#concession2").change(function() {
        var concession = $(this).val();
        var fee = $('#fee2').val();
        var newFee = calculateConcession(concession, fee)
        document.getElementById("fee2").value = newFee;
        total();

    })
    $("#concession3").change(function() {
        var fee = $('#fee3').val()
        var concession = $(this).val();
        var newFee = calculateConcession(concession, fee)
        document.getElementById("fee3").value = newFee;
        total();
    })
    $("#concession4").change(function() {
        var fee = $('#fee4').val()
        var concession = $(this).val();
        var newFee = calculateConcession(concession, fee)
        document.getElementById("fee4").value = newFee;
        total();
    })
    $("#concession5").change(function() {
        var fee = $('#fee5').val()
        var concession = $(this).val();
        var newFee = calculateConcession(concession, fee)
        document.getElementById("fee5").value = newFee;
        total();
    })
    $("#concession6").change(function() {
        var fee = $('#fee6').val()
        var concession = $(this).val();
        var newFee = calculateConcession(concession, fee)
        document.getElementById("fee6").value = newFee;
        total();
    })
    $("#concession7").change(function() {
        var concession = $(this).val();
        var fee = $('#fee7').val();
        var newFee = calculateConcession(concession, fee)
        document.getElementById("fee7").value = newFee;
        total();

    })
    $("#concession8").change(function() {
        var concession = $(this).val();
        var fee = $('#fee8').val()
        var newFee = calculateConcession(concession, fee)
        document.getElementById("fee8").value = newFee;
        total();

    })
    $("#concession9").change(function() {
        var concession = $(this).val();
        var fee = $('#fee9').val();
        var newFee = calculateConcession(concession, fee)
        document.getElementById("fee9").value = newFee;
        total();

    });


    $("#fee1").keyup(function() {
        total();
    })
    $("#fee2").keyup(function() {
        total();
    })
    $("#fee3").keyup(function() {
        total();
    })
    $("#fee4").keyup(function() {
        total();
    })
    $("#fee5").keyup(function() {
        total();
    })
    $("#fee6").keyup(function() {
        total();
    })
    $("#fee7").keyup(function() {
        total();
    })
    $("#fee8").keyup(function() {
        total();
    })
    $("#fee9").keyup(function() {
        total();
    })
</script>


@stop