@extends('layouts.admin')

@section('heading')
Fee Manager
@stop
@section('content')




<style>
    .btn {
        margin-right: 10px;
    }

    .form-control {
        display: flex;
        align-items: center;
    }


    input {
        margin-left: 20px;
    }
</style>








<div class="row">
    <div class="col-lg-12 text-center">
        <div class="col-lg-12" style="position:relative; left:50%; transform:translateX(-50%); margin-top:30px;">
            <table class="table table-bordered thead-dark">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Adm No.</th>
                        <th scope="col">Class</th>
                        <th scope="col">Father Name</th>
                        <th scope="col">Tel.</th>
                        <th scope="col">DOA</th>
                        <th scope="col">Concession</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$student->name}}</td>
                        <td>{{$student->adm_no}}</td>
                        <td>{{$student->grade->class}}-{{$student->section}}</td>
                        <td>{{$student->father}}</td>
                        <td>{{$student->tel1}}, {{$student->tel2 == 0 ? 'N/A' : $student->tel2}}</td>
                        <td>{{$student->admission_date}}</td>
                        <td>
                            {!! Form::select('concession' , $concession , $fee->concession , ['class'=>'form-control' , 'id'=>'concessionTotal' , 'placeholder'=>'Select concession']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>


{!! Form::model($fee , [

'action'=>['FeeController@update' , $fee->id],
'method'=>'PATCH',

]) !!}

<div class=" col-sm-12 col-lg-12">
    <div class="card card-success card-tabs">
        <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Quater 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Quater 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Quater 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="true">Quater 4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-annual-tab" data-toggle="pill" href="#custom-tabs-one-annual" role="tab" aria-controls="custom-tabs-one-annual" aria-selected="true">Annual Charges</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-admission-tab" data-toggle="pill" href="#custom-tabs-one-admission" role="tab" aria-controls="custom-tabs-one-admission" aria-selected="true">Admission Charges</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-prospectous-tab" data-toggle="pill" href="#custom-tabs-one-prospectous" role="tab" aria-controls="custom-tabs-one-prospectous" aria-selected="true">Prospectous Charge</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-reciepts-tab" data-toggle="pill" href="#custom-tabs-one-reciepts" role="tab" aria-controls="custom-tabs-one-reciepts" aria-selected="true">Reciepts</a>
                </li>

            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <div class="row">
                        <div class="col-lg-12" style="display: flex;">
                            <div class="col-lg-4">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">April</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" value="{{$student->grade->fee}},April Monthly Fee,1" name="amf" id="checkboxPrimary1" {{$fee->amf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary1"> April Monthly Fee {{now()->year}} <a href="/exempt?name=amf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-danger d-inline">
                                                        <input type="checkbox" name="acf" id="checkboxDanger1" value="{{$student->grade->computer_fee}},April Computer Fee,2" {{$fee->acf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxDanger1">April Computer Fee {{now()->year}} <a href="/exempt?name=acf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        @if($student->convinience_req !== 0)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" name="acf" id="checkboxSuccess1" value="{{$student->stationName->fee}},April Transport Fee,3" class="transportfee" {{$fee->atf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxSuccess1">April Transport Fee {{now()->year}} <a href="/exempt?name=atf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->class == 100)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" name="asf" id="checkboxSuccess1" value="{{$student->grade->stationary_fee}},April Stationary Fee,4" class="stationaryfee" {{$fee->asf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxSuccess1">April Stationary Fee {{now()->year}} <a href="/exempt?name=asf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">May</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" value="{{$student->grade->fee}},May Monthly Fee,1" name="maymf" id="checkboxPrimary2" {{$fee->maymf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary2"> May Monthly Fee {{now()->year}} <a href="/exempt?name=maymf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-danger d-inline">
                                                        <input type="checkbox" name="maycf" id="checkboxDanger2" value="{{$student->grade->computer_fee}},May Computer Fee,2" {{$fee->maymf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxDanger2">May Computer Fee {{now()->year}} <a href="/exempt?name=maycf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        @if($student->convinience_req == 1)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" value="{{$student->stationName->fee}},May Transport Fee,3" name="maytf" id="checkboxSuccess2" {{$fee->maytf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxSuccess2">May Transport Fee {{now()->year}} <a href="/exempt?name=maytf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->class == 100)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-warning d-inline">
                                                        <input type="checkbox" name="asf" id="checkboxWarning2" value="{{$student->grade->stationary_fee}},May Stationary Fee,4" class="stationaryfee" {{$fee->maysf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxWarning2">May Stationary Fee {{now()->year}} <a href="/exempt?name=maysf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">June</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" value="{{$student->grade->fee }},June Monthly Fee,1" name="junemf" id="checkboxPrimary3" {{$fee->junemf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary3"> June Monthly Fee {{now()->year}} <a href="/exempt?name=junemf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-danger d-inline">
                                                        <input type="checkbox" value="{{$student->grade->computer_fee}},June Computer Fee,2" name="junecf" id="checkboxDanger3" {{$fee->junecf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxDanger3">June Computer Fee {{now()->year}} <a href="/exempt?name=junecf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        @if($student->convinience_req == 1)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" value="{{$student->stationName->fee}},June Tansport Fee,3" name="junetf" id="checkboxSuccess3" {{$fee->junetf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxSuccess3">June Transport Fee {{now()->year}} <a href="/exempt?name=junetf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        @endif
                                        @if($student->class == 100)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-warning d-inline">
                                                        <input type="checkbox" name="asf" id="checkboxwarning3" value="{{$student->grade->stationary_fee}},June Stationary Fee,4" {{$fee->junesf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxwarning3">June Stationary Fee {{now()->year}} <a href="/exempt?name=junesf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

                    <div class="col-lg-12">
                        <div class="row" style="display: flex;">
                            <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">July</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" value="{{$student->grade->fee}},July Monthly Fee,1" name="julymf" id="checkboxPrimary4" {{$fee->julymf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary4"> July Monthly Fee {{now()->year}} <a href="/exempt?name=julymf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-danger d-inline">
                                                        <input type="checkbox" value="{{$student->grade->computer_fee}},July Computer Monthly Fee,2" name="julycf" id="checkboxDanger4" {{$fee->julycf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxDanger4">July Computer Fee {{now()->year}} <a href="/exempt?name=julycf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        @if($student->convinience_req == 1)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" value="{{$student->stationName->fee}},July Transport Fee,3" name="julytf" id="checkboxSuccess4" {{$fee->julytf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxSuccess4">July Transport Fee {{now()->year}} <a href="/exempt?name=julytf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-warning d-inline">
                                                        <input type="checkbox" value="{{$student->grade->sports}},ID Card Fee (JULY),6" name="julyid_card_fee" id="checkboxWarning4" {{$fee->julyid_card_fee == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxWarning4">July ID Card Fee {{now()->year}} <a href="/exempt?name=julyid_card_fee&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        @if($student->class == 100)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-warning d-inline">
                                                        <input type="checkbox" name="asf" id="checkboxWarning88" value="{{$student->grade->stationary_fee}},July Stationary Fee,4" class="stationaryfee" {{$fee->julysf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxWarning88">July Stationary Fee {{now()->year}} <a href="/exempt?name=julysf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">August</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" value="{{$student->grade->fee}},August Monthly Fee,1" name="augmf" id="checkboxPrimary5" {{$fee->augmf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary5"> August Monthly Fee {{now()->year}} <a href="/exempt?name=augmf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-danger d-inline">
                                                        <input type="checkbox" value="{{$student->grade->computer_fee}},August Computer Fee,2" name="augcf" id="checkboxDanger5" {{$fee->augcf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxDanger5">August Computer Fee {{now()->year}} <a href="/exempt?name=augcf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        @if($student->convinience_req == 1)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" value="{{$student->stationName->fee}},August Transport Fee,3" name="augtf" id="checkboxSuccess5" {{$fee->augtf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxSuccess5">August Transport Fee {{now()->year}} <a href="/exempt?name=augtf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        @endif
                                        @if($student->class == 100)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-warning d-inline">
                                                        <input type="checkbox" name="asf" id="checkboxWarning5" value="{{$student->grade->stationary_fee}},August Stationary Fee,4" class="stationaryfee" {{$fee->augsf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxWarning5">August Stationary Fee {{now()->year}} <a href="/exempt?name=augsf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">September</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" value="{{$student->grade->fee}},September Monthly Fee,1" name="septmf" id="checkboxPrimary6" {{$fee->septmf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary6"> September Monthly Fee {{now()->year}} <a href="/exempt?name=septmf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-danger d-inline">
                                                        <input type="checkbox" value="{{$student->grade->computer_fee}},September Computer Fee,2" name="septcf" id="checkboxDanger6" {{$fee->septcf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxDanger6">September Computer Fee {{now()->year}} <a href="/exempt?name=septcf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        @if($student->convinience_req == 1)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" value="{{$student->stationName->fee}},September Transport Fee,3" name="septtf" id="checkboxSuccess6" {{$fee->septtf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxSuccess6">September Transport Fee {{now()->year}} <a href="/exempt?name=septtf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        @endif
                                        @if($student->class == 100)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-warning d-inline">
                                                        <input type="checkbox" name="asf" id="checkboxWarning6" value="[{{$student->grade->stationary_fee}},September Stationary Fee,4" class="stationaryfee" {{$fee->septsf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxWarning6">September Stationary Fee {{now()->year}} <a href="/exempt?name=septsf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <div class="col-lg-12">
                        <div class="row" style="display: flex;">
                            <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">October</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" value="{{$student->grade->fee}},October Monthly Fee,1" name="octmf" id="checkboxPrimary8" {{$fee->octmf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary8"> October Monthly Fee {{now()->year}} <a href="/exempt?name=octmf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-danger d-inline">
                                                        <input type="checkbox" value="{{$student->grade->computer_fee}},October Computer Fee,2" name="octcf" id="checkboxDanger8" {{$fee->octcf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxDanger8">October Computer Fee {{now()->year}} <a href="/exempt?name=octcf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        @if($student->convinience_req == 1)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" value="{{$student->stationName->fee}},October Transport Fee,3" name="octtf" id="checkboxSuccess8" {{$fee->octtf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxSuccess8">October Transport Fee {{now()->year}} <a href="/exempt?name=octtf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        @endif
                                        @if($student->class == 100)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-warning d-inline">
                                                        <input type="checkbox" name="asf" id="checkboxWarning8" value="{{$student->grade->stationary_fee}},October Stationary Fee,4" class="stationaryfee" {{$fee->octsf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxWarning8">October Stationary Fee {{now()->year}} <a href="/exempt?name=octsf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-warning d-inline">
                                                        <input type="checkbox" value="{{$student->grade->stationary}},October Examination Fee,5" name="octexamination_fee" id="checkboxWarning50" {{$fee->octexamination_fee == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxWarning50">October Examination Fee {{now()->year}} <a href="/exempt?name=octexamination_fee&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">November</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" value="{{$student->grade->fee}},November Monthly Fee,1" name="novmf" id="checkboxPrimary9" {{$fee->novmf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary9"> November Monthly Fee {{now()->year}} <a href="/exempt?name=novmf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-danger d-inline">
                                                        <input type="checkbox" value="{{$student->grade->computer_fee}},November Computer Fee,2" name="novcf" id="checkboxDanger9" {{$fee->novcf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxDanger9">November Computer Fee {{now()->year}} <a href="/exempt?name=novcf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        @if($student->convinience_req == 1)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" value="{{$student->stationName->fee}},November Transport fee,3" name="novtf" id="checkboxSuccess9" {{$fee->novtf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxSuccess9">November Transport Fee {{now()->year}} <a href="/exempt?name=novtf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        @endif
                                        @if($student->class == 100)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-warning d-inline">
                                                        <input type="checkbox" name="asf" id="checkboxWarning9" value="{{$student->grade->stationary_fee}},November Stationary Fee,4" class="stationaryfee" {{$fee->novsf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxWarning9">November Stationary Fee {{now()->year}} <a href="/exempt?name=novsf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">December</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" value="{{$student->grade->fee}},December Monthly Fee,1" name="decmf" id="checkboxPrimary10" {{$fee->decmf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary10"> December Monthly Fee {{now()->year}} <a href="/exempt?name=decmf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-danger d-inline">
                                                        <input type="checkbox" value="{{$student->grade->computer_fee}},December Computer Fee,2" name="deccf" id="checkboxDanger10" {{$fee->deccf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxDanger10">December Computer Fee {{now()->year}} <a href="/exempt?name=deccf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        @if($student->convinience_req == 1)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" value="{{$student->stationName->fee}},December Transport Fee,3" name="dectf" id="checkboxSuccess10" {{$fee->dectf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxSuccess10">December Transport Fee {{now()->year}} <a href="/exempt?name=dectf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        @endif
                                        @if($student->class == 100)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-warning d-inline">
                                                        <input type="checkbox" name="asf" id="checkboxWarning10" value="{{$student->grade->stationary_fee}},December Stationary Fee,4" class="stationaryfee" {{$fee->decsf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxWarning10">December Stationary Fee {{now()->year}} <a href="/exempt?name=decsf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                    <div class="col-lg-12">
                        <div class="row" style="display: flex;">
                            <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">January</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" value="{{$student->grade->fee}},January Monthly Fee,1" name="jmf" id="checkboxPrimary12" {{$fee->jmf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary12"> January Monthly Fee {{now()->year}} <a href="/exempt?name=jmf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-danger d-inline">
                                                        <input type="checkbox" value="{{$student->grade->computer_fee}},January Computer Fee,2" name="jcf" id="checkboxDanger12" {{$fee->jcf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxDanger12">January Computer Fee {{now()->year}} <a href="/exempt?name=jcf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        @if($student->convinience_req == 1)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" value="{{$student->grade->fee}},January Transport Fee, 3" name="jtf" id="checkboxSuccess12" {{$fee->jtf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxSuccess12">January Transport Fee {{now()->year}} <a href="/exempt?name=jtf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->class == 100)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-warning d-inline">
                                                        <input type="checkbox" name="asf" id="checkboxWarning12" value="{{$student->grade->stationary_fee}},January Stationary Fee,4" class="stationaryfee" {{$fee->jsf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxWarning12">January Stationary Fee {{now()->year}} <a href="/exempt?name=jsf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">February</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" value="{{$student->grade->fee}},February Monthly Fee,1" name="fmf" id="checkboxPrimary13" {{$fee->fmf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary13"> February Monthly Fee {{now()->year}} <a href="/exempt?name=fmf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-danger d-inline">
                                                        <input type="checkbox" value="{{$student->grade->computer_fee}},February Computer Fee,2" name="fcf" id="checkboxDanger13" {{$fee->fcf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxDanger13">February Computer Fee {{now()->year}} <a href="/exempt?name=fcf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        @if($student->cnvinience_req == 1)
                                        <!-- Minimal red style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" value="{{$student->stationName->fee}},February Transport Fee,3" name="ftf" id="checkboxSuccess13" {{$fee->ftf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxSuccess13">February Transport Fee {{now()->year}} <a href="/exempt?name=ftf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        @endif
                                        @if($student->class == 100)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-warning d-inline">
                                                        <input type="checkbox" name="asf" id="checkboxWarning13" value="{{$student->grade->stationary_fee}},February Stationary Fee,4" class="stationaryfee" {{$fee->fsf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxWarning13">February Stationary Fee {{now()->year}} <a href="/exempt?name=fsf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">March</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" value="{{$student->grade->fee}},March Monthly Fee,1" name="mmf" id="checkboxPrimary14" {{$fee->mmf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary14"> March Monthly Fee {{now()->year}} <a href="/exempt?name=mmf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-danger d-inline">
                                                        <input type="checkbox" value="{{$student->grade->computer_fee}},March Computer Fee,2" name="mcf" id="checkboxDanger14" {{$fee->mcf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxDanger14">March Computer Fee {{now()->year}} <a href="/exempt?name=mcf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Minimal red style -->
                                        @if($student->convinience_req == 1)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" value="{{$student->stationName->fee}},March Transport Fee,3" name="mtf" id="checkboxSuccess14" {{$fee->mtf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxSuccess14">March Transport Fee {{now()->year}} <a href="/exempt?name=mtf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        @endif
                                        @if($student->class == 100)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-warning d-inline">
                                                        <input type="checkbox" name="asf" id="checkboxWarning14" value="{{$student->grade->stationary_fee}},March Stationary Fee,4" class="stationaryfee" {{$fee->msf == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxWarning14">March Stationary Fee {{now()->year}} <a href="/exempt?name=msf&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-annual" role="tabpanel" aria-labelledby="custom-tabs-one-annual-tab">
                    <div class="col-lg-12">
                        <div class="row" style="display: flex;">

                            <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Annual Charges</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" name="annual_charges" id="checkboxPrimary20" value="5000,Annual Charges,8" {{$fee->annual_charges == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary20"> Annual Charges {{now()->year}} <a href="/exempt?name=&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-admission" role="tabpanel" aria-labelledby="custom-tabs-one-admission-tab">
                    <div class="col-lg-12">
                        <div class="row" style="display: flex;">

                            <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Admission Charges</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" name="admission_fee" id="checkboxPrimary21" value="10000,Admission Fee,8" {{$fee->admission_fee == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary21"> Admission Charges {{now()->year}} <a href="/exempt?name=&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-prospectous" role="tabpanel" aria-labelledby="custom-tabs-one-prospectous-tab">
                    <div class="col-lg-12">
                        <div class="row" style="display: flex;">

                            <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Prospectous Charges</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Minimal style -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- checkbox -->
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="checkbox" name="prospectus" id="checkboxPrimary22" value="800,Prospectus Charges,8" {{$fee->prospectus == 1 ? 'checked' : ''}}>
                                                        <label for="checkboxPrimary22"> Prospectous Charges {{now()->year}} <a href="/exempt?name=&id={{$fee->id}}" class="nav-link">Exempt</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-reciepts" role="tabpanel" aria-labelledby="custom-tabs-one-reciepts-tab">

                    <button type="button" id="tmodal" class="btn btn-danger" data-toggle="modal" data-target="#modal-xl">
                        View All Reciepts
                    </button>

                    <div class="modal fade" id="modal-xl" tabindex="-1" style="position: relative; left:50%; transform:translate(-30% , -80%)">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content" style="width:min-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Search Results</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="myTable" class="table table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Class & Section</th>
                                                <th>Father Name</th>
                                                <th>Recieved Amount</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($reciepts as $reciept)

                                            <tr>
                                                <td>{{$reciept->id}}</td>
                                                <td>{{$reciept->getStudent->name}}</td>
                                                <td>{{$reciept->getStudent->class == 100 ? 'Pre-Nursery 1' : $reciept->getStudent->class}}-{{$reciept->getStudent->section}}</td>
                                                <td>{{$reciept->getStudent->father}}</td>
                                                <td>₹ {{$reciept->paid}}</td>
                                                <td style="display:flex;">
                                                    <a href="{{route('reciepts.show' , $reciept->id)}}" style="margin-left:10px;" class="btn btn-md btn-warning">Show</a>
                                                </td>
                                            </tr>

                                            @endforeach
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

                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>


<div class="row" style="padding: 20px;">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Total Amount Payable</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6" style="position:relative; left:50%; transform:translateX(-50%)">
                        <table border="1" class="table" id="tgf">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Particular</th>
                                    <th scope="col">Fee</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <table border="1" class="table table-striped">

                            <tbody class="text-center text-bold">
                                <tr>
                                    <td colspan="2">Previous Outstanding</td>
                                    <td id="">
                                        <input type="text" style="border:1px solid black; padding:10px; font-size:16px;" name="" disabled value="{{$fee->outstanding}}" name="" id="adjustment">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Amount Payable</td>
                                    <td id="totalBill"></td>
                                </tr>

                                <tr>
                                    <td colspan="2">Amount Recieved</td>
                                    <td id="">
                                        <input type="text" required onkeyup="calculateBalance()" style="border:1px solid black; padding:10px; font-size:16px;" name="" id="recieved">
                                    </td>

                                </tr>
                                <tr id="">
                                    <td colspan="2" id="changeName">Outstanding Balance</td>
                                    <td>
                                        <input type="text" readonly style="border:1px solid black; padding:10px;font-size:16px;" name="outstanding" id="balance">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" id="changeName" class="text-center">
                                        {!! Form::submit('Pay&rarr;' , ['class'=>'btn btn-lg btn-warning' , 'id'=>'submit' , 'style'=>'transform:translateX(-30px)']) !!}
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>


<input type="hidden" name="particulars" id="a">
<input type="hidden" name="fee" id="b">
<input type="hidden" name="paid" id="c">
<input type="hidden" name="outstanding" id="d">
<input type="hidden" name="student_id" id="e">


{!! Form::close() !!}










@stop


@section('script-plugins')

<script>
    var student_id = <?php echo $student->id ?>;




    var onMonthlyFee = <?php echo $fee_concession !== null ? $fee_concession->monthly : 0 ?>;
    var onComputerFee = <?php echo $fee_concession !== null ? $fee_concession->computer : 0 ?>;
    var onTransportFee = <?php echo $fee_concession !== null ? $fee_concession->transport : 0 ?>;
    var onIdFee = <?php echo $fee_concession !== null ? $fee_concession->id_card : 0 ?>;
    var onExaminationFee = <?php echo $fee_concession !== null ? $fee_concession->examination : 0 ?>;
    var onStationaryFee = <?php echo $fee_concession !== null ? $fee_concession->stationary : 0 ?>;


    var d = new Date();
    var n = d.getMonth();


    if (n == 1 || n == 2 || n == 3) {
        $('#custom-tabs-one-settings-tab').click();
    } else if (n == 4 || n == 5 || n == 6) {
        $('#custom-tabs-one-home-tab').click();
    } else if (n == 7 || n == 8 || n == 9) {
        $('#custom-tabs-one-profile-tab').click();
    } else if (n == 10 || n == 11 || n == 12) {
        $('#custom-tabs-one-messages-tab').click();
    }


    $('#concessionTotal').change(function() {
        var con_id = $(this).val();
        $.ajax({
            url: '/concessionapply?id=' + student_id + '&con_id=' + con_id,
            type: 'get',
            dataType: 'json',
            success: function(response) {

                window.location.href = "/fee/student/" + student_id;
            }
        });
    })


    var fee = [];
    var particular = [];

    var j = 1



    function calculateBalance() {
        var paid = document.getElementById("recieved").value;
        var balance = calculateToatl() - parseInt(paid);
        if (balance < 0) {
            document.getElementById("changeName").innerHTML = "Overpaid"
            document.getElementById("balance").value = balance;;

        } else {
            document.getElementById("changeName").innerHTML = "Outstanding"
            document.getElementById("balance").value = balance;
        }
    }


    function editArray(index, value) {
        fee[index] = value;
        calculateToatl();
        calculateBalance();
    }

    function calculateToatl() {
        var array = []
        for (var i = 0; i < fee.length; i++) {
            var getValues = document.getElementById(i).value;
            array.push(parseInt(getValues));
        }
        var overpaid = document.getElementById("adjustment").value;
        total = array.reduce((a, b) => a + b, 0) + parseInt(overpaid);
        document.getElementById('totalBill').innerHTML = "₹ " + total;
        return total;
    }


    function createTable(data1, data2) {


        $("#tgf").find("tr:not(:first)").remove();

        var j = 1
        for (var i = 0; i < particular.length; i++) {




            // Find a <table> element with id="myTable":
            var table = document.getElementById("tgf");


            // Create an empty <tr> element and add it to the 1st position of the table:
            var row = table.insertRow(-1);



            // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);



            // Add some text to the new cells:
            cell1.innerHTML = j++;
            cell2.innerHTML = data1[i];
            cell3.innerHTML = "<div style='padding:0px 50px; class='form-group'><input type='text' class='form-control' onkeyup='editArray(this.id , this.value)'   id='" + i + "' value='" + parseInt(data2[i]) + "'></div>";
        }
    }



    $('input[type=checkbox').change(function() {


        var data = $(this).val().split(",");


        if ($(this).prop("checked") == true) {

            var applyConcession;
            var latestFee


            if (data[2] == 1) {
                if (onMonthlyFee !== 0) {
                    applyConcession = (onMonthlyFee / 100) * parseInt(data[0]);
                    latestFee = parseInt(data[0]) - applyConcession;
                } else {
                    applyConcession = parseInt(data[0]);
                    latestFee = parseInt(data[0])
                }
            } else if (data[2] == 2) {
                if (onMonthlyFee !== 0) {
                    applyConcession = (onComputerFee / 100) * parseInt(data[0])
                    latestFee = parseInt(data[0]) - applyConcession;
                } else {
                    applyConcession = parseInt(data[0]);
                    latestFee = parseInt(data[0])
                }
            } else if (data[2] == 3) {
                if (onMonthlyFee !== 0) {
                    applyConcession = (onTransportFee / 100) * parseInt(data[0])
                    latestFee = parseInt(data[0]) - applyConcession;
                } else {
                    applyConcession = parseInt(data[0]);
                    latestFee = parseInt(data[0])
                }
            } else if (data[2] == 4) {
                if (onMonthlyFee !== 0) {
                    applyConcession = (onStationaryFee / 100) * parseInt(data[0])
                    latestFee = parseInt(data[0]) - applyConcession;
                } else {
                    applyConcession = parseInt(data[0]);
                    latestFee = parseInt(data[0])
                }
            } else if (data[2] == 5) {
                if (onMonthlyFee !== 0) {
                    applyConcession = (onExaminationFee / 100) * parseInt(data[0])
                    latestFee = parseInt(data[0]) - applyConcession;
                } else {
                    applyConcession = parseInt(data[0]);
                    latestFee = parseInt(data[0])
                }
            } else if (data[2] == 6) {
                if (onMonthlyFee !== 0) {
                    applyConcession = (onIdFee / 100) * parseInt(data[0])
                    latestFee = parseInt(data[0]) - applyConcession;
                } else {
                    applyConcession = parseInt(data[0]);
                    latestFee = parseInt(data[0])
                }
            } else if (data[2] == 8) {

                latestFee = parseInt(data[0])
            }


            fee.push(latestFee);
            particular.push(data[1]);

            createTable(particular, fee);
            calculateToatl(fee);

        } else if ($(this).prop("checked") == false) {
            for (var i = 0; i < particular.length; i++) {
                if (particular[i] == data[1]) {
                    var index = i;
                    particular.splice(index, 1);
                    fee.splice(index, 1);
                    createTable(particular, fee);
                    calculateToatl(fee)
                }
            }
        }






    });



    $('#submit').click(function() {
        $('input[type=checkbox').val(1);
        var paid = document.getElementById('recieved').value;
        var balance = document.getElementById('balance').value;

        $('#a').val(particular);
        $('#b').val(fee);
        $('#c').val(paid);
        $('#d').val(balance);
        $('#e').val(student_id);

    });
</script>


@stop