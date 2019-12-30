@extends('layouts.admin')

@section('heading')
Promote Students
@stop


@section('content')




<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Select class and section to promote</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="row" style="padding: 40px;">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Select Class:</label>
                            {!! Form::select('class' , $classes , 0 , ['class'=>'form-control' , 'placeholder'=>'Select a class below' ,
                            'id'=>'select_class'])
                            !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Select Section:</label>
                            <select name="" class="form-control" id="select_section">
                                <option value="" selected>Select a section below</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">

            </div>
            <!-- /.card-footer -->
        </div>
    </div>
</div>


<div class="row" id="promotion_to" style="display:none">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Promote the selected class to</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="row" style="padding: 40px;">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Select Class:</label>
                            {!! Form::select('class' , $classes , 0 , ['class'=>'form-control' , 'placeholder'=>'Select a class below' ,
                            'id'=>'to_class'])
                            !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Select Section:</label>
                            <select name="" class="form-control" id="to_section">
                                <option value="" selected>Select a section below</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
                <button id="promote" class="btn btn-md btn-warning">Promote</button>
            </div>
            <!-- /.card-footer -->
        </div>
    </div>
</div>


@stop

@section('script-plugins')

<script>
    $(document).ready(function() {

        var current_class;
        var current_section;
        var new_class;
        var new_section;

        $('#select_class').change(function() {
            current_class = $(this).val();
        })

        $('#select_section').change(function() {
            current_section = $(this).val();
            $('#promotion_to').css('display', 'block');
        });

        $('#to_class').change(function() {
            new_class = $(this).val();
        })

        $('#to_section').change(function() {
            new_section = $(this).val();
        })


        $("#promote").click(function() {


            $.ajax({
                url: '/promoteStudents?cc=' + current_class + '&cs=' + current_section + '&nc=' + new_class + '&ns=' + new_section,
                type: 'get',
                dataType: 'json',
                success: function(response) {

                    window.location.href = "/promote";

                }
            });
        });

    });
</script>

@stop