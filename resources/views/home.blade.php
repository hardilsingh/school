@extends('layouts.admin')
@section('title')
Dashboard
@stop

@section('heading')
Dashboard
@stop

@section('content')

<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Students</span>
                <span class="info-box-number">{{$students}}

                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-male"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Male Count</span>
                <span class="info-box-number">{{$male}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-female"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Female Count</span>
                <span class="info-box-number">{{$female}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-check-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Collection</span>
                <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Male Female Ratio</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="donutChart" style="height: 230px; min-height: 230px; display: block; width: 572px; font-size:18px;" width="715" height="287" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recently Registered Students</h3>

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
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    @foreach($students_latest as $student)
                    <li class="item">
                        <div class="product-img">

                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">{{$student->name}}
                                <span class="badge badge-warning float-right"></span></a>
                            <span class="product-description">
                                {{$student->admission_date}} | Class: {{$student->grade->class}}-{{$student->section}}
                            </span>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">

            </div>
            <!-- /.card-footer -->
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Total Students Class And Section Wise</h3>

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
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>Class</th>
                                <th>A</th>
                                <th>B</th>
                                <th>C</th>
                                <th>D</th>
                                <th>E</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($classes as $class)
                            <tr>
                                <td><span style="font-size: 18px" class="badge badge-lg badge-success">{{$class->class}}</span></td>
                                <td>{{$students_dis->where('section' , 'A')->where('class' , $class->id)->count()}}</td>
                                <td>{{$students_dis->where('section' , 'B')->where('class' , $class->id)->count()}}</td>
                                <td>{{$students_dis->where('section' , 'C')->where('class' , $class->id)->count()}}</td>
                                <td>{{$students_dis->where('section' , 'D')->where('class' , $class->id)->count()}}</td>
                                <td>{{$students_dis->where('section' , 'E')->where('class' , $class->id)->count()}}</td>
                                <td><span style="font-size: 18px" class="badge badge-lg badge-warning">{{$students_dis->where('class' , $class->id)->count()}}</span></td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

            </div>
            <!-- /.card-footer -->
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Total Male Female Class Wise</h3>

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
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>Class</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Total</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($classes as $class)
                            <tr>
                                <td><span style="font-size: 18px" class="badge badge-lg badge-success">{{$class->class}}</span></td>
                                <td>{{$students_dis->where('gender' , 0)->where('class' , $class->id)->count()}}</td>
                                <td>{{$students_dis->where('gender' , 1)->where('class' , $class->id)->count()}}</td>
                                <td><span style="font-size: 18px" class="badge badge-lg badge-warning">{{$students_dis->where('class' , $class->id)->count()}}</span></td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

            </div>
            <!-- /.card-footer -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Religions By Class</h3>

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
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>Class</th>
                                @foreach($religions as $religion)
                                <th>{{$religion->name}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($classes as $class)
                            <tr>
                                <td><span style="font-size: 18px" class="badge badge-lg badge-success">{{$class->class}}</span></td>
                                <td>{{$students_dis->where('religion' , 1)->where('class' , $class->id)->count()}}</td>
                                <td>{{$students_dis->where('religion' , 2)->where('class' , $class->id)->count()}}</td>
                                <td>{{$students_dis->where('religion' , 3)->where('class' , $class->id)->count()}}</td>
                                <td>{{$students_dis->where('religion' , 4)->where('class' , $class->id)->count()}}</td>
                                <td>{{$students_dis->where('religion' , 5)->where('class' , $class->id)->count()}}</td>
                                <td>{{$students_dis->where('religion' , 6)->where('class' , $class->id)->count()}}</td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

            </div>
            <!-- /.card-footer -->
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Caste Category By Class</h3>

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
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>Class</th>
                                @foreach($castes as $caste)
                                <th>{{$caste->name}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($classes as $class)
                            <tr>
                                <td><span style="font-size: 18px" class="badge badge-lg badge-success">{{$class->class}}</span></td>
                                <td>{{$students_dis->where('cast' , 1)->where('class' , $class->id)->count()}}</td>
                                <td>{{$students_dis->where('cast' , 2)->where('class' , $class->id)->count()}}</td>
                                <td>{{$students_dis->where('cast' , 3)->where('class' , $class->id)->count()}}</td>
                                <td>{{$students_dis->where('cast' , 4)->where('class' , $class->id)->count()}}</td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

            </div>
            <!-- /.card-footer -->
        </div>
    </div>
</div>





</div>



@stop

@section('script-plugins')

<!-- ChartJS -->
<script src="/plugins/chart.js/Chart.min.js"></script>


<script>
    var male = @json($male);
    var female = @json($female);

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData = {
        labels: [
            'Male',
            'Female'
        ],
        datasets: [{
            data: [male, female],
            backgroundColor: ['#f56954', '#00a65a'],
        }]
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
    })
</script>
@stop